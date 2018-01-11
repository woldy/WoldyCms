<?php

namespace Woldy\Cms\Providers;

use Illuminate\Support\ServiceProvider;
use Tpl;
class wCmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'woldycms');
        $configPath=__DIR__.'/../resources/wcms.php';
        $this->publishes([$configPath => config_path('wcms.php')],'wcms');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommands();
        $this->app->register(\Woldy\Cms\Http\RouteServiceProvider::class);
        $this->app->register(\Woldy\Cms\Providers\TplServiceProvider::class);
        $this->app->register(\Woldy\Cms\Providers\EventServiceProvider::class);//缓存没法管，先不加了
	      $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        if(config('wcms')['common_cfg']['cache_monitor']??false){
            $this->app->register(\Mews\Captcha\CaptchaServiceProvider::class);
        }
        $this->app->booting(function(){
            $loader=\Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Tpl','Woldy\Cms\Facades\Tpl');
            $loader->alias('Setting','\Woldy\Cms\Components\Util\Setting');
            $loader->alias('Menu','\Woldy\Cms\Components\Util\Menu');
            $loader->alias('User','\Woldy\Cms\Components\User\User');
            $loader->alias('Form','\Woldy\Cms\Components\Form\Form');
            $loader->alias('Debugbar','\Barryvdh\Debugbar\Facade');
            $loader->alias('Captcha','\Mews\Captcha\Facades\Captcha');
       });

    }

    /**
     * Register the make:seed generator.
     */
    private function registerCommands()
    {
        $this->app->singleton('command.wcms.test', function ($app) {
            return $app['Woldy\Cms\Commands\TestCommand'];
        });
        $this->commands('command.wcms.test');
    }
}
