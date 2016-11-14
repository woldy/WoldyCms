<?php

namespace Woldy\Cms\Components\Util;

use Illuminate\Support\ServiceProvider;
//use View;

class CfgServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['cfg'] = $this->app->share(function ($app) {
            return new Cfg();
        });
    }
}
