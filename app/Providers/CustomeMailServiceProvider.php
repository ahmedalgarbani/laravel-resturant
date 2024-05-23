<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class CustomeMailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        $mailSetting = Cache::rememberForever('mail_settings', function () {
            $keys = [
                'mail_receiver',
                'mail_driver',
                'mail_host',
                'mail_port',
                'mail_username',
                'mail_password',
                'mail_encryption',
                'mail_form_address'
            ];

               return Setting::whereIn('key', $keys)->pluck('value', 'key')->toArray();
        });

        if ($mailSetting) {
            config::set('mail.mailers.smtp.host', $mailSetting['mail_host']);
            config::set('mail.mailers.smtp.port', $mailSetting['mail_port']);
            config::set('mail.mailers.smtp.encryption', $mailSetting['mail_encryption']);
            config::set('mail.mailers.smtp.username', $mailSetting['mail_username']);
            config::set('mail.mailers.smtp.password', $mailSetting['mail_password']);
            config::set('mail.from.address', $mailSetting['mail_form_address']);
        }
    }
}
