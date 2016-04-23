<?php

namespace Woldy\Cms\FE;

use Illuminate\Support\ServiceProvider;

class TplServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'../../views', 'woldycms');


        $this->publishes([
            __DIR__.'../../views' => base_path('resources/views/woldycms'),
            __DIR__.'../../config/tpl.php' => config_path('tpl.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['tpl'] = $this->app->share(function ($app) {
            return new Tpl($app['config']);
        });
    }
}
