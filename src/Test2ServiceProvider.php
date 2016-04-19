<?php

namespace Woldy\Cms;

use Illuminate\Support\ServiceProvider;

class Test2ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['test2'] = $this->app->share(function ($app) {
            return new Test2();
        });
    }
}
