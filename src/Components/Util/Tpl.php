<?php
namespace Woldy\Cms\Components\Util;
use Illuminate\Config\Repository;
use Request;
use Cache;
use Woldy\Cms\Models\MenuModel;
class Tpl{

	static $config;
	public function __construct(Repository $config){
		self::$config = $config;
	}


	public static function getcss(){

	}

	public static function view($tpl,$type='portal',$val=array()){
		$config=self::getconf($type.'_cfg');
		$val['version']=$config['version']??'';
		$val['static']=[
			'css'=>"/css/{$type}/".str_replace('.', '/', $tpl).'.css',
			'js'=>"/js/{$type}/".str_replace('.', '/', $tpl).'.js'
		];
		$val=array_merge($val,$config);
		$layout=$config['tpl_base'].'.'.$tpl;
	    return view($layout,$val);
	}


	//获取模板配置
	public static function getconf($option){
		$conf=self::$config->get('wcms.'.$option);
		return $conf;
	}

	public static function getinfo(){
				$urlpath='/'.urldecode(Request::path());
				$info=Cache::get('menu_info_'.md5($urlpath));
				if(empty($info)){
					$info=MenuModel::where('url','=',$urlpath)->first();
					Cache::put('menu_info_'.md5($urlpath),$info,10);
				}

        if(!empty($info)){
        	$info=$info->toarray();
        }
        return $info;
	}

	public static function static_base($type){
		$config=self::getconf($type.'_cfg');
		return $config['static_base'];
	}

}
