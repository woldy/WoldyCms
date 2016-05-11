<?php

namespace Woldy\Cms\Components\Form;

use Illuminate\Support\ServiceProvider;
//use View;

class FormServiceProvider extends ServiceProvider
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
        $this->app['form'] = $this->app->share(function ($app) {
            return new Form();
        });
    }
}
