<?php
namespace Woldy\Cms\Components\Util;
use Woldy\Cms\Models\SettingModel;
use Cache;
class Setting{
	public static function get($key){
		$info=Cache::tags('setting')->get('wcms_setting_'.$key);
		if(empty($info)){
			$info=SettingModel::where('key', $key)->first()->value??'';
			Cache::tags('setting')->put('wcms_setting_'.$key,$info,10);
		}
		return $info;
	}

	public static function list(){

	}
}
