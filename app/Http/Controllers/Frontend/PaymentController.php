<?php

namespace App\Http\Controllers\frontend;

use App\Events\OrderPaymentUpdateEvent;
use App\Events\OrderPlacedNotificationEvent;
use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    public function index()
    {
        if (!(session()->has('delivery_fee') && session()->has('address'))) {
            throw ValidationException::withMessages(['error' => 'Something went wrong, please try again.']);
        }

        $subTotal = GlobalTotal();
        $delivery_fee = session()->get('delivery_fee');
        $discount = session()->get('coupon')['discount']??0;
        $finalTotal = session()->get('coupon')?session()->get('coupon')['finalTotal']+$delivery_fee:GlobalTotal($delivery_fee);
        session()->put('finalTotal',$finalTotal);
        return view('frontend.home.pages.payment', compact(
            'subTotal',
            'delivery_fee',
            'discount',
            'finalTotal'
        ));
    }


    public function paymentCancel(){
        $this->transactionFailUpdateStatus('payment');
        return view('frontend.home.pages.payment-cancel');
    }

    public function paymentSuccess(){
        return view('frontend.home.pages.payment-success');
    }




    public function makePayment(Request $request, OrderService $orderService)
    {
        $request->validate([
            'payment_getway' => ['required', 'string', 'in:paypal,stripe,razorpay'],
        ]);
        if ($orderService->createOrder()) {
            switch ($request->payment_getway) {
                case 'paypal':
                    return response(['redirect_url' => route('paypal.payment')]);
                    break;
                case 'stripe':
                    return response(['redirect_url' => route('stripe.payment')]);
                    break;
                case 'razorpay':
                    return response(['redirect_url' => route('razorpay-redirect')]);
                    break;
                default:
                    throw ValidationException::withMessages(['error' => 'Unsupported payment gateway selected.']);
            }
        } else {
            throw ValidationException::withMessages(['error' => 'Failed to create order, please try again.']);
        }
    }

    public function setPaypalConfig(){
        $config = [
            'mode'    => config('PaymentGetwaySetting.paypal_account_mode'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
            'sandbox' => [
                'client_id'         => config('PaymentGetwaySetting.paypal_api_key'),
                'client_secret'     => config('PaymentGetwaySetting.paypal_secret_key'),
                'app_id'            => 'APP-80W284485P519543T',
            ],
            'live' => [
                'client_id'         => config('PaymentGetwaySetting.paypal_api_key'),
                'client_secret'     => config('PaymentGetwaySetting.paypal_secret_key'),
                'app_id'            => config('PaymentGetwaySetting.paypal_app_id'),
            ],

            'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
            'currency'       => config('PaymentGetwaySetting.paypal_currency'),
            'notify_url'     => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
            'locale'         => 'en_US', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
            'validate_ssl'   => true, // Validate SSL when creating api client.
        ];
        return $config;
    }
    public function payWithPaypal()
    {
        $config = $this->setPaypalConfig();
        $provider = new PayPalClient($config);
        $provider->setApiCredentials($config);

        try {
            $provider->getAccessToken();
            $grand_total = session()->get('grant_total');
            $paypalAmount = round($grand_total * config('PaymentGetwaySetting.paypal_rate', 1), 2);

            $response = $provider->createOrder([
                'intent' => "CAPTURE",
                'application_context' => [
                    'return_url' => route('paypal.success'),
                    'cancel_url' => route('paypal.cancel'),
                ],
                'purchase_units' => [
                    [
                        'amount' => [
                            'currency_code' => config('PaymentGetwaySetting.paypal_currency', 'USD'),
                            'value' => $paypalAmount,
                        ],
                    ],
                ],
            ]);

            if(isset($response['id']) && $response['id'] != null){
                foreach ($response['links'] as $link){
                    if($link['rel']=='approve'){
                        return redirect()->away($link['href']);
                    }
                }
            }else{
                throw new \Exception('Failed to create PayPal order, invalid response from PayPal.');

            }
        } catch (\Exception $e) {
            \Log::error('PayPal Payment Error: ' . $e->getMessage());

//            \Log::error('PayPal Payment Response: ' . json_encode($response));

            return redirect()->back()->withErrors(['error' => 'There was an issue connecting to PayPal. Please try again later.']);
        }


    }

    /** Stripe Method */
    public function payWithStripe()
    {
        // Set the API key correctly
        Stripe::setApiKey(config('PaymentGetwaySetting.stripe_secret_key'));

        // Retrieve the grand total from the session and calculate the Stripe amount
        $grand_total = session()->get('finalTotal');
        $stripeAmount = round($grand_total * config('PaymentGetwaySetting.paypal_rate')) * 100;

        // Create a new Stripe session for the payment
        $response = StripeSession::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => config('PaymentGetwaySetting.stripe_currency'),
                    'product_data' => [
                        'name' => 'Product'
                    ],
                    'unit_amount' => $stripeAmount,
                    ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('stripe.cancel'),
        ]);

        return redirect()->away($response->url);
    }

    public function paypalSuccess(Request $request,OrderService $orderService)
    {
        $config = $this->setPaypalConfig();
        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if(isset($response['status']) && $response['status'] === 'COMPLETED'){
            $orderId = session()->get('order_id');
            $info = $response['purchase_units'][0]['payments']['captures'][0];
            $paymentInfo = [
              'transaction_id'=>$info['id'],
              'currency'=>$info['amount']['currency_code'],
                'status'=>$info['status']
            ];
            OrderPaymentUpdateEvent::dispatch($orderId,$paymentInfo,'paypal');
            OrderPlacedNotificationEvent::dispatch($orderId);
            $orderService->clearSession();
            return redirect()->route('payment.success');
        }else{
            $this->transactionFailUpdateStatus('paypal');

            return redirect()->route('payment.cancel')
                ->withErrors(['error'=>$response['error']['message']]);

        }
    }



    public function stripeSuccess(Request $request,OrderService $orderService)
    {
        $session_id = $request->session_id;
        Stripe::setApiKey(config('PaymentGetwaySetting.stripe_secret_key'));
        $response = StripeSession::retrieve($session_id);

            if($response->payment_status === 'paid'){
                $orderId = session()->get('order_id');
                $paymentInfo = [
                    'transaction_id'=>$response->payment_intent,
                    'currency'=>$response->currency,
                    'status'=>$response->status
                ];

                OrderPaymentUpdateEvent::dispatch($orderId,$paymentInfo,'stripe');
                OrderPlacedNotificationEvent::dispatch($orderId);
                $orderService->clearSession();
                return redirect()->route('payment.success');
            }else{
                $this->transactionFailUpdateStatus('stripe');
                return redirect()->route('payment.cancel');
            }
    }

    public function redirectRazorpay(){
        return view('frontend.home.pages.razorpay-checkout');
    }


    public function payWithRazorpay(Request $request, OrderService $orderService)
    {
        // Initialize the Razorpay API with the configuration settings
        $api = new Api(
            config('PaymentGetwaySetting.razorpay_api_key'),
            config('PaymentGetwaySetting.razorpay_secret_key')
        );

        // Check if the request has and is filled with 'razorpay_payment_id'
        if ($request->has('razorpay_payment_id') && $request->filled('razorpay_payment_id')) {
            // Retrieve the grant total from the session
            $grant_total = session()->get('grant_total');
            if (!$grant_total) {
                return redirect()->route('payment.cancel')->withErrors(['error' => 'Grant total not found in session']);
            }

            // Calculate the total amount based on the configured rate
            $totalAmount = $grant_total * config('PaymentGetwaySetting.razorpay_rate') * 100;

            try {
                // Fetch and capture the payment
                $response = $api->payment
                    ->fetch($request->razorpay_payment_id)
                    ->capture(['amount' => $totalAmount]);

                // Check if the payment status is 'captured'
                if ($response['status'] === 'captured') {
                    $orderId = session()->get('order_id');
                    $paymentInfo = [
                        'transaction_id'=>$response->id,
                        'currency'=>config('settings.default_currency'),
                        'status'=>"COMPLETED"
                    ];

                    OrderPaymentUpdateEvent::dispatch($orderId,$paymentInfo,'stripe');
                    OrderPlacedNotificationEvent::dispatch($orderId);
                    $orderService->clearSession();
                    return redirect()->route('payment.success');
                } else {
                    // Handle unsuccessful payment capture
                    $this->transactionFailUpdateStatus('razorpay');
                    return redirect()->route('payment.cancel')->withErrors(['error' => 'Payment capture failed']);
                }
            } catch (\Exception $e) {
                // Log the exception and redirect to the payment cancellation route
                logger($e->getMessage());

                $this->transactionFailUpdateStatus('razorpay');
                return redirect()->route('payment.cancel')->withErrors(['error' => 'Payment processing failed']);
            }
        }

        // Redirect to payment cancellation if no payment ID is found in the request

        $this->transactionFailUpdateStatus('razorpay');
        return redirect()->route('payment.cancel')->withErrors(['error' => 'No payment ID found in the request']);
    }


    public function paypalCancel()
    {
        $this->transactionFailUpdateStatus('paypal');
        return redirect()->route('payment.cancel');
    }

    public function transactionFailUpdateStatus($getwayName){
        $orderId = session()->get('order_id');
        $paymentInfo = [
            'transaction_id'=>'',
            'currency'=>'',
            'status'=>'Failed'
        ];

        OrderPaymentUpdateEvent::dispatch($orderId,$paymentInfo,'stripe');
    }
}
