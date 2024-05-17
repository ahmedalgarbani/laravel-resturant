<?php

namespace App\Providers;

use App\services\PaymentGetwaySettingService;
use App\services\SettingService;
use Illuminate\Support\ServiceProvider;

class PaymentGatewaySettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PaymentGetwaySettingService::class,function (){
            return new PaymentGetwaySettingService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $paymentGatewaySetting = $this->app->make(PaymentGetwaySettingService::class);
        $paymentGatewaySetting->setGlobalSettings();
    }
}
