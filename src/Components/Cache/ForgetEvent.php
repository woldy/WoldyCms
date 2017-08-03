<?php
namespace Woldy\Cms\Components\Cache;
use Illuminate\Cache\Events\KeyForgotten;
use Cache;
class ForgetEvent{
  public function __construct()
  {
      //
  }

  /**
   * Handle the event.
   *
   * @param PostSaved $event
   * @return void
   */
  public function handle(KeyForgotten $event)
  {
    if($event->key=='cache_list' || $event->key=='cache_tag_list'){
      return;
    }
    $cache_list=Cache::get('cache_list');
    $cache_tag_list=Cache::get('cache_tag_list');

    unset($cache_list[$event->key]);

    foreach ($event->tags as $tag) {
      unset($cache_tag_list[$tag][$event->key]);
    }

    Cache::forever('cache_tag_list',$cache_tag_list);
    Cache::forever('cache_list',$cache_list);
  }
}
