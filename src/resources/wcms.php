<?php
$xenon=[
		'common_js'=>[
			"/js/LAB.min.js",
			"/js/common/bootstrap.min.js",
			"/js/xenon/TweenMax.min.js",
			"/js/xenon/resizeable.js",
			"/js/xenon/joinable.js",
			"/js/xenon/xenon-api.js",
			"/js/xenon/xenon-toggles.js",
			"/js/xenon/xenon-custom.js",
			"/js/xenon/common.js",
		],
		'common_css'=>[
			'/css/fonts/fontawesome/css/font-awesome.min.css',
			'/css/fonts/linecons/css/linecons.css',
			'/css/bootstrap.css',
			'/css/xenon-core.min.css',
			'/css/admin/common.css',
			'/css/xenon-forms.css',
			'/css/xenon-components.css',
			//'/assetswoldycms//css/xenon-skins.css',
		]
];



return [
	'common_cfg'=>[
		'cache_monitor'=>true
	],
	'admin_cfg'=>[
			'menu_id'=>'0',
			'logo2x'=>'/assets/images/logo.png',
			'logo_c'=>'/assets/images/flag.png',
      'tpl_base'=>'woldycms::admin',//模板目录
      'tpl_layout'=>'woldycms::xenon.layout.left',//left,letfc,top,topleft,topleftc
    	'static_url' =>'/assets/woldycms',//静态资源地址
      'static_base'=>'/assets/woldycms',//基础组件静态资源地址/res?src=
    	'common_js'=>array_merge($xenon['common_js'],['/js/xenon/jquery-validate/jquery.validate.min.js']),
    	'common_css'=>$xenon['common_css'],
	],


    'muzuo_cfg'=>[
        // 'title'=>'woldycms',
				'menu_id'=>'0',
			  'logo2x'=>'/assets/images/logo.png',
				'logo_c'=>'/assets/images/flag.png',
        'tpl_base'=>'muzuo',//模板目录
        //'tpl_portal'=>'',//模板主框架
        'tpl_layout'=>'woldycms::xenon.layout.left',//left,letfc,top,topleft,topleftc
				'static_url' =>'/assets',//静态资源地址
	      'static_base'=>'/assets/woldycms',//基础组件静态资源地址/res?src=
				'common_js'=>array_merge($xenon['common_js'],['/js/xenon/jquery-ui/jquery-ui.min.js','/js/common/markdown.min.js','/js/xenon/tocify/jquery.tocify.min.js']),
	    	'common_css'=>$xenon['common_css'],
    ],


];
