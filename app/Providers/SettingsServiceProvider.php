<?php

namespace App\Providers;

use App\services\SettingService;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(SettingService::class,function (){
            return new SettingService();
        });

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $SettingService = $this->app->make(SettingService::class);
        $SettingService->setGlobalSettings();
    }
}
