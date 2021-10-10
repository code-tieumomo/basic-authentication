<?php

namespace CodeTieumomo\BasicAuthentication;

use Illuminate\Support\ServiceProvider;

class BasicAuthenticationProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'basic-authentication');
        $this->mergeConfigFrom(
            __DIR__ . '/config/basic-authentication.php',
            'basic-authentication'
        );
        $this->publishes([
            __DIR__ . '/config/basic-authentication.php' => config_path('basic-authentication.php'),
        ]);
    }

    public function register()
    {
    }
}
