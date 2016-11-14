<?php
namespace Woldy\Cms\Components\Util;
use Woldy\Cms\Models\ConfigModel;
class Cfg{
	public static function get($key){
		return ConfigModel::where('key', $key)->first()->value;
	}

}