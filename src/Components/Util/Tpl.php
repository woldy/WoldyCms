<?php
namespace Woldy\Cms\Components\Util;
use Illuminate\Config\Repository;
use Request;
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
		$val['version']=$config['version'];
		$val['static']=[
			'css'=>"/assets/css/{$type}/".str_replace('.', '/', $tpl).'.css',
			'js'=>"/assets/js/{$type}/".str_replace('.', '/', $tpl).'.js'
		];
		$val=array_merge($val,$config);
		$layout=$config['tpl_base'].'.'.$tpl;
	    return view($layout,$val);	 
	}


	//获取模板配置
	public static function getconf($option){
		$conf=self::$config->get('tpl.'.$option);
		return $conf;
	}

	public static function getinfo(){
		$urlpath='/'.urldecode(Request::path()); 
        $info=MenuModel::where('url','=',$urlpath)->first();
        if(!empty($info)){
        	$info=$info->toarray();
        }
        return $info;
	}
 
} 