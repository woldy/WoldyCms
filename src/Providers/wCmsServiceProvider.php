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
        //
        //
      //  $this->publishes([
      //     __DIR__.'/../../views' => base_path('resources/views/woldycms'),
      //        __DIR__.'/../../config/tpl.php' => config_path('tpl.php'),
      //    ]);


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {


       $this->app->register(\Woldy\Cms\Http\RouteServiceProvider::class);
       $this->app->register(\Woldy\Cms\Providers\TplServiceProvider::class);
       $this->app->register(\Woldy\Cms\Providers\CfgServiceProvider::class);
       $this->app->register(\Woldy\Cms\Providers\MenuServiceProvider::class);
       $this->app->register(\Woldy\Cms\Providers\TplServiceProvider::class);
       $this->app->register(\Woldy\Cms\Providers\UserServiceProvider::class);
       $this->app->register(\Woldy\Cms\Providers\FormServiceProvider::class);
	   $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
	   
       $this->app->booting(function(){
          $loader=\Illuminate\Foundation\AliasLoader::getInstance();
          $loader->alias('Tpl','Woldy\Cms\Facades\Tpl');
          $loader->alias('Cfg','Woldy\Cms\Facades\Cfg');
          $loader->alias('Menu','Woldy\Cms\Facades\Menu');
          $loader->alias('User','Woldy\Cms\Facades\User');
          $loader->alias('Form','Woldy\Cms\Facades\Form');
          $loader->alias('Debugbar','\Barryvdh\Debugbar\Facade');
       });

       
    }
}
