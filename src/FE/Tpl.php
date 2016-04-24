<?php
namespace Woldy\Cms\FE;
use Illuminate\Config\Repository;
class Tpl{

	static $config;
	static $version=0;

	public function __construct(Repository $config){
		self::$config = $config;
	}

	public static function test(){
		echo "test\n";
	}


	public static function getcss(){

	}
	public static function admin($tpl,$val=array()){		
		$val['template']=$tpl;
		$val['version']=self::$version;
		$admincfg=self::$config->get('tpl.admin_cfg');
		$admin_tpl=$admincfg['admin_tpl'];
		$val['static_url']=$admincfg['static_url']; //静态资源引用地址
		$val['common_css']=$admincfg['common_css']; //公共css样式
		$val['common_js']=$admincfg['common_js']; //公共js脚本
	    return view($admin_tpl,$val);	  	
	}

	public static function getconf(){
		

		
	}


	public static function portal(){

	}
} 