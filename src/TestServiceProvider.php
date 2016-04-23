<?php

namespace Woldy\Cms;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'Test');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/vendor/test'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['test'] = $this->app->share(function ($app) {
            return new Test();
        });
    }
}
