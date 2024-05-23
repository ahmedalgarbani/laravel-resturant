<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentGetway;
use App\Providers\PaymentGatewaySettingsServiceProvider;
use App\services\PaymentGetwaySettingService;
use App\Trails\UploadImageTrail;
use Illuminate\Http\Request;

class PaymentGetwayController extends Controller
{
    use UploadImageTrail;

    public function index(){
        $paymentGetway = PaymentGetway::pluck('value','key');
        return view('Admin.payment-getway.index',compact('paymentGetway'));
    }

    public function paypalSettingUpdate(Request $request){
        $validateData = $request->validate([
            'paypal_status'=>['required','boolean'],
            'paypal_account_mode'=>['required','in:sandbox,live'],
            'paypal_country'=>['required'],
            'paypal_currency'=>['required'],
            'paypal_rate'=>['required','numeric'],
            'paypal_api_key'=>['required'],
            'paypal_secret_key'=>['required'],
            'paypal_app_id'=>['required'],
        ]);

        if ($request->hasFile('paypal_logo')){
            $request->validate([
               'paypal_logo'=>['nullable','image']
            ]);
            $image = $this->updateImage($request,'paypal_logo');
            PaymentGetway::updateOrCreate(
                ['key'=>'paypal_logo'],
                ['value'=>$image]
            );
        }


        foreach ($validateData as $key=>$value){
            PaymentGetway::updateOrCreate(
                ['key'=>$key],
                ['value'=>$value]
            );
        }


        $settingCache = app(PaymentGetwaySettingService::class);
        $settingCache->clearCachedSettings();


        toastr()->success('updated successfully!');
        return redirect()->back();
    }

    public function stripeSettingUpdate(Request $request){
        $validateData = $request->validate([
            'stripe_status'=>['required','boolean'],
            'stripe_country'=>['required'],
            'stripe_currency'=>['required'],
            'stripe_rate'=>['required','numeric'],
            'stripe_api_key'=>['required'],
            'stripe_secret_key'=>['required'],
        ]);

        if ($request->hasFile('stripe_logo')){
            $request->validate([
                'stripe_logo'=>['nullable','image']
            ]);
            $image = $this->updateImage($request,'stripe_logo');
            PaymentGetway::updateOrCreate(
                ['key'=>'stripe_logo'],
                ['value'=>$image]
            );
        }


        foreach ($validateData as $key=>$value){
            PaymentGetway::updateOrCreate(
                ['key'=>$key],
                ['value'=>$value]
            );
        }


        $settingCache = app(PaymentGetwaySettingService::class);
        $settingCache->clearCachedSettings();


        toastr()->success('updated successfully!');
        return redirect()->back();
    }



    public function razorpaySettingUpdate(Request $request){
        $validateData = $request->validate([
            'razorpay_status'=>['required','boolean'],
            'razorpay_country'=>['required'],
            'razorpay_currency'=>['required'],
            'razorpay_rate'=>['required','numeric'],
            'razorpay_api_key'=>['required'],
            'razorpay_secret_key'=>['required'],
        ]);

        if ($request->hasFile('razorpay_logo')){
            $request->validate([
                'razorpay_logo'=>['nullable','image']
            ]);
            $image = $this->updateImage($request,'razorpay_logo');
            PaymentGetway::updateOrCreate(
                ['key'=>'razorpay_logo'],
                ['value'=>$image]
            );
        }


        foreach ($validateData as $key=>$value){
            PaymentGetway::updateOrCreate(
                ['key'=>$key],
                ['value'=>$value]
            );
        }


        $settingCache = app(PaymentGetwaySettingService::class);
        $settingCache->clearCachedSettings();


        toastr()->success('updated successfully!');
        return redirect()->back();
    }






}
