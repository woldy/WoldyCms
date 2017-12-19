<?php
namespace Woldy\Cms\Components\Event;
use Illuminate\Cache\Events\KeyWritten;
use Cache;
class WriteEvent{
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
  public function handle(KeyWritten $event)
  {

      if($event->key=='cache_list' || $event->key=='cache_tag_list'){
        return;
      }
      $cache_list=Cache::get('cache_list');
      $cache_tag_list=Cache::get('cache_tag_list');

      $cache_list[$event->key]=[
          'created_at'=>time(),
          'minutes'=>$event->minutes,
          'tags'=>implode(';',$event->tags)
      ];

      foreach ($cache_list as $idx=>$cache) {
        if($cache['created_at']+$cache['minutes']*60<time()){
          unset($cache_list[$idx]);
          foreach ($event->tags as $tag) {
            unset($cache_tag_list[$tag][$idx]);
          }
        }
      }

      foreach ($event->tags as $tag) {
        $cache_tag_list[$tag][$event->key]=[
            'created_at'=>time(),
            'minutes'=>$event->minutes,
            'tags'=>implode(';',$event->tags)
        ];
      }


      Cache::forever('cache_tag_list',$cache_tag_list);
      Cache::forever('cache_list',$cache_list);
  }
}
