<?php
namespace Woldy\Cms\Components\Util;
use Illuminate\Config\Repository;
class Tpl{

	static $config;
	static $version=0;

	public function __construct(Repository $config){
		self::$config = $config;
	}


	public static function getcss(){

	}
	// public static function admin($tpl,$val=array()){
	// 	$val['version']=self::$version;
	// 	$config=self::getconf('admin_cfg');
	// 	$val['static']=[
	// 		'css'=>'/assets/css/admin/'.str_replace('.', '/', $tpl).'.css',
	// 		'js'=>'/assets/js/admin/'.str_replace('.', '/', $tpl).'.js'
	// 	];
	// 	$val=array_merge($val,$config);
	// 	$layout=$config['tpl_base'].'.'.$tpl;
	//     return view($layout,$val);	  	
	// }


	// public static function portal($tpl,$val=array()){
	// 	$val['version']=self::$version;
	// 	$config=self::getconf('portal_cfg');
	// 	$val['static']=[
	// 		'css'=>'/assets/css/portal/'.str_replace('.', '/', $tpl).'.css',
	// 		'js'=>'/assets/js/portal/'.str_replace('.', '/', $tpl).'.js'
	// 	];
	// 	$val=array_merge($val,$config);
	// 	$layout=$config['tpl_base'].'.'.$tpl;
	//     return view($layout,$val);	  	
	// }



	public static function view($tpl,$type='portal',$val=array()){
		$val['version']=self::$version;
		$config=self::getconf($type.'_cfg');
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


 
} 