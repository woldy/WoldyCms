<?php
namespace Woldy\Cms\Components\Form;
use Woldy\Cms\Components\Form\Element\Native;
use Woldy\Cms\Components\Form\Element\Advanced;
use Woldy\Cms\Components\Form\Element\Masks;
use Woldy\Cms\Components\Form\Element\Misc;

use DB;
use Request;
class Form{
	private static $Native=["area","text","password","email","file","textarea","select","checkbox","radio","switch"];

    public function buildForm($config=''){
    	$config=[
    		"a","b"
    	];

    	self::buildElement("text",$config);
        return '';
    }


    public static  function buildElement($type,$config){
    	if(in_array($type,self::$Native)){
    		echo call_user_func_array('Woldy\Cms\Components\Form\Element\Native::get'.$type,$config);
    	}
    }


    public function testconfig(){
    	//type=>["area","text","password","email","file","textarea","select","checkbox","radio","switch"]
     	$config=[
     		"url"=>"",
     		"action"=>"",
     		"item"=>[
     			[
     				"type"=>"textbox",
     				"name"=>"",
     				"placeholder"=>"",
     				"class"=>"",
     				"size"=>"",
     				"grid"=>"",
     				"validate"

     			],
     		]
    	];   	
    }
}