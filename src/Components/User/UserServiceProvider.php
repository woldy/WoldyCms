<?php

namespace Woldy\Cms\Components\User;

use Illuminate\Support\ServiceProvider;
//use View;

class UserServiceProvider extends ServiceProvider
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
        $this->app['user'] = $this->app->share(function ($app) {
            return new User();
        });
    }
}
