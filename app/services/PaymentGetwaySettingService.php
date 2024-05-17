<?php


namespace App\services;


use App\Models\PaymentGetway;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class PaymentGetwaySettingService
{

    function getSettings(){
        return Cache::rememberForever('PaymentGetwaySetting',function (){
           return PaymentGetway::pluck('value','key')->toArray();
        });
    }


    function setGlobalSettings(){
        $settings = $this->getSettings();
        config()->set('PaymentGetwaySetting',$settings);
    }

    function clearCachedSettings(){
        Cache::forget('PaymentGetwaySetting');
    }

}
