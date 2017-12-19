<?php

namespace Woldy\Cms\Providers;

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

      //$this->loadViewsFrom(__DIR__.'/../../views', 'woldycms');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->singleton('tpl', function ($app) {
          return new \Woldy\Cms\Components\Util\Tpl($app['config']);
      });

    }
}
