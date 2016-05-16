<?php
namespace Woldy\Cms\Components\Form;
use Woldy\Cms\Components\Form\Element\Native;
use Woldy\Cms\Components\Form\Element\Advanced;
use Woldy\Cms\Components\Form\Element\Masks;
use Woldy\Cms\Components\Form\Element\Misc;

use DB;
use Request;
class Form{
    private $js_list=[];
    private $css_list=[];
    private $code_list=[];
    private $config_tpl=[
        'attr'=>[
            'id'=>'',
        ]
    ]

	private  $Native=["area","text","password","email","file","textarea","select","checkbox","radio","switch"];

    public function buildForm($config=''){
    	$config=[
    		"a","b"
    	];

    	self::buildElement("text",$config);
        return '';
    }

    private function form(){
        private $config_tpl=[
            'action'=>'',
            'mothod'=>''
        ]
    }

    private function text(){

        return $this;
    }



}