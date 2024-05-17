<?php

namespace App\Http\Controllers\frontend;

use App\Events\OrderPaymentUpdateEvent;
use App\Events\OrderPlacedNotificationEvent;
use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function index()
    {
        if (!(session()->has('delivery_fee') && session()->has('address'))) {
            throw ValidationException::withMessages(['error' => 'Something went wrong, please try again.']);
        }

        $subTotal = GlobalTotal();
        $delivery_fee = session()->get('delivery_fee');
        $discount = 0;
        $finalTotal = GlobalTotal($delivery_fee);

        return view('frontend.home.pages.payment', compact(
            'subTotal',
            'delivery_fee',
            'discount',
            'finalTotal'
        ));
    }

    public function makePayment(Request $request, OrderService $orderService)
    {
        $request->validate([
            'payment_getway' => ['required', 'string', 'in:paypal'],
        ]);

        if ($orderService->createOrder()) {
            switch ($request->payment_getway) {
                case 'paypal':
                    return response(['redirect_url' => route('paypal.payment')]);
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
                'app_id'            => env('PAYPAL_LIVE_APP_ID', ''),
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
            $grand_total = session()->get('grand_total');
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

            \Log::error('PayPal Payment Response: ' . json_encode($response));

            return redirect()->back()->withErrors(['error' => 'There was an issue connecting to PayPal. Please try again later.']);
        }


    }





    public function paypalSuccess(Request $request)
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
            return view('frontend.home.pages.payment_success');
        }
    }

    public function paypalCancel()
    {
        // Handle PayPal cancel response
        return view('frontend.home.pages.payment_cancel');
    }
}
