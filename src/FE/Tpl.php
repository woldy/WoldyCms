<?php
namespace Woldy\Cms\FE;
use Illuminate\Config\Repository;
class Tpl{

	static $config;

	public function __construct(Repository $config){
		self::$config = $config;
	}

	public static function test(){
		echo "test\n";
	}


	public static function getcss(){

	}
	public static function admin($tpl,$val=array()){
		$admin_tpl=self::$config->get('tpl.admin_tpl');
		$val['template']=$tpl;
		$val['version']='0';
		$val['static_url']=self::$config->get('tpl.static_url');
		$val['common_css']=self::$config->get('tpl.common_css');
	    return view($admin_tpl,$val);	  	
	}


	public static function portal(){

	}
} 