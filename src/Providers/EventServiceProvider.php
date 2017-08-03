<?php

namespace Woldy\Cms\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
     protected $listen = [
       // 'Illuminate\Cache\Events\CacheHit' => [
       //     'App\Listeners\LogCacheHit',
       // ],
       //
       // 'Illuminate\Cache\Events\CacheMissed' => [
       //     'App\Listeners\LogCacheMissed',
       // ],

       'Illuminate\Cache\Events\KeyForgotten' => [
           'Woldy\Cms\Components\Cache\ForgetEvent',
       ],

       'Illuminate\Cache\Events\KeyWritten' => [
           'Woldy\Cms\Components\Cache\WriteEvent',
       ],
   ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
