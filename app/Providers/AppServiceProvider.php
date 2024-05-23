<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $key = ['pusher_key','pusher_app_id','pusher_secret','pusher_cluster'];
        $pusherConf = Setting::whereIn('key',$key)->pluck('value','key');
        config(['broadcasting.connections.pusher.key'=>$pusherConf['pusher_key']]);
        config(['broadcasting.connections.pusher.app_id'=>$pusherConf['pusher_app_id']]);
        config(['broadcasting.connections.pusher.secret'=>$pusherConf['pusher_secret']]);
        config(['broadcasting.connections.pusher.options.cluster'=>$pusherConf['pusher_cluster']]);

        Paginator::useBootstrap();
    }
}
