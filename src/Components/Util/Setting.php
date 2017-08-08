<?php
namespace Woldy\Cms\Components\Util;
use Woldy\Cms\Models\SettingModel;
class Setting{
	public static function get($key){
		return SettingModel::where('key', $key)->first()->value??'';
	}

	public static function list(){

	}

}
