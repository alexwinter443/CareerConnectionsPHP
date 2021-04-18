<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\services\data\utility\MyLogger3;

class LoggingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\services\data\utility\ILoggerService', function($app){
            
            return new MyLogger3();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
