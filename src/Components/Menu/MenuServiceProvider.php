<?php

namespace Woldy\Cms\Components\Menu;

use Illuminate\Support\ServiceProvider;
//use View;

class MenuServiceProvider extends ServiceProvider
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
        $this->app['menu'] = $this->app->share(function ($app) {
            return new Menu();
        });
    }
}
