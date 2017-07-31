<?php
namespace Woldy\Cms\Http\Controllers\Admin;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use App\Http\Requests;
use Woldy\Cms\Http\Controllers\Controller;
use Woldy\Cms\Models\MenuModel;
use Redirect;
use Menu;
use Tpl;
use Form;

class MenuController extends Controller
{
    public function getList($type){
//private $Native=["area","text","password","email","file","textarea","select","checkbox","radio","switch"];
    	$config=[
    		[
    			'type'=>'form',
    			'attr'=>[
           			'action'=>'/admin/menu/item',
            		'method'=>'post',
            		'novalidate'=>"novalidate"
    			],
                'class'=>"validate",
    		],

    		[
    			'type'=>'text',
    			'label'=>'标签',
    			'attr'=>[
           			'name'=>'title',
           			'id'=>'title',
           			'data-validate'=>'required',
					'data-message-required'=>'请输入标签名称！'

    			],
          'p_class'=>'',
    		],

    		[
    			'type'=>'text',
    			'label'=>'连接',
    			'attr'=>[
           			'name'=>'url',
           			'id'=>'url',
    			],
          'p_class'=>'',
    		],

    		[
    			'type'=>'text',
    			'label'=>'图标',
    			'attr'=>[
           			'name'=>'icon',
           			'id'=>'icon',
    			],
          'p_class'=>'',
    		],

    		[
    			'type'=>'text',
    			'label'=>'class',
    			'attr'=>[
           			'name'=>'class',
           			'id'=>'class',
    			],
          'p_class'=>'',
    		],

            [
                'type'=>'text',
                'label'=>'nav标题',
                'attr'=>[
                    'name'=>'navtitle',
                    'id'=>'navtitle',
                ],
                'p_class'=>'',
            ],

            [
                'type'=>'text',
                'label'=>'nav介绍',
                'attr'=>[
                    'name'=>'navtext',
                    'id'=>'navtext',
                ],
                'p_class'=>'',
            ],

            [
                'type'=>'text',
                'label'=>'seo标题',
                'attr'=>[
                    'name'=>'seotitle',
                    'id'=>'seotitle',
                ],
                'p_class'=>'',
            ],

            [
                'type'=>'text',
                'label'=>'seo介绍',
                'attr'=>[
                    'name'=>'seotext',
                    'id'=>'seotext',
                ],
                'p_class'=>'',
            ],

            [
                'type'=>'iSwitch',
                'label'=>'是否显示',
                'class'=>'iswitch-info',
                'attr'=>[
                    'name'=>'display',
                    'id'=>'display',
                    'checked'=>'',
                ],
            ],

            [
                'type'=>'iSwitch',
                'label'=>'是否启用',
                'class'=>'iswitch-info',
                'attr'=>[
                    'name'=>'enable',
                    'id'=>'enable',
                    'checked'=>'',
                ],
            ],

    		[
    			'type'=>'hidden',
    			'attr'=>[
           			'name'=>'id',
           			'id'=>'id',
           			'value'=>'0'
    			],
    		],

    		[
    			'type'=>'hidden',
    			'attr'=>[
           			'name'=>'type',
           			'id'=>'type',
           			'value'=>$type
    			],
    		],

    		[
    			'type'=>'submit',
    			'label'=>'增加',
    			'attr'=>[
    				'class'=>'btn btn-primary btn-single pull-right',
           			'id'=>'submit',
    			],
    		],

     		[
    			'type'=>'endform'
    		],

    	];


        $cfgform['attr']=[
            'action'=>'/admin/menu/list',
            'mothod'=>'post'
        ];

        $listform=Form::build($config);

    	//Form::init($cfgform)->show();
    	//$form->show();
    	//Menu::show();
    	return Tpl::view('menu.list','admin',[
            'listform'=>$listform,
            'menu_html'=>Menu::edit_list(intval($type))
        ]);
    }


    public function postSort(){
    	$pids=[];
		$sortstr=Input::get('sortstr');
		$items=explode("\n", $sortstr);
		$idx=0;
		foreach ($items as $item) {
			$path='0';
			$idx++;
			if(empty($item)){
				return;
			}
			$item=explode('|', $item);
			$id=$item[0];
			$level=$item[1];
			$pids[$level]=$id;
			if($level==0){
				$pid=0;
			}else{
				$pid=$pids[$level-1];
			}

			for($i=0;$i<=$level;$i++){
				$path.='-'.$pids[$i];
			}

			MenuModel::where('id', $id)
			->update([
				'pid' => $pid,
				'idx'=>$idx,
				'path'=>$path

			]);
		}
		echo "ok";
    }

    public function getItem(){
    	$id=Input::get('id');
    	$item=\Woldy\Cms\Models\MenuModel::find($id);
    	return response()->json($item);
    }


    public function getDel(){

        $id=Input::get('id');
        $item=\Woldy\Cms\Models\MenuModel::find($id);
        if(!empty($item)){
            $item->delete();
        }

        $result=[
            'errcode'=>0,
            'errmsg'=>'ok'
        ];
        return response()->json($result);
    }

    public function postItem(){
    	$id=intval(Input::get('id'));
        $input = Input::except('_token');
        $input['display']=$input['display']??'off';
        $input['enable']=$input['enable']??'off';
    	if($id==0){
        	$item = new \Woldy\Cms\Models\MenuModel;
        	$item->pid=0;
        	$item->display=$input['display'];
        	$item->enable=$input['enable'];
            MenuModel::create($input);
    	}else{
    		$item = \Woldy\Cms\Models\MenuModel::find($id);
            $item->update($input);
    	}
    	return Redirect::back();
    }

    public function getEdit(){
        $config=[
            [
                'type'=>'form',
                'attr'=>[
                    'action'=>'/admin/menu/item',
                    'method'=>'post',
                    'novalidate'=>"novalidate"
                ],
                'class'=>"validate",
            ],

            [
                'type'=>'text',
                'label'=>'分类名称',
                'attr'=>[
                    'name'=>'title',
                    'id'=>'title',
                    'data-validate'=>'required',
                    'data-message-required'=>'请输入标签名称！'

                ],
            ],

            [
                'type'=>'submit',
                'label'=>'增加',
                'attr'=>[
                    'class'=>'btn btn-primary btn-single pull-right',
                    'id'=>'submit',
                ],
            ],

            [
                'type'=>'endform'
            ],

        ];


        $cfgform['attr']=[
            'action'=>'/admin/menu/list',
            'mothod'=>'post'
        ];

        $form=Form::build($config);
        return Tpl::view('menu.edit','admin',[
            'form'=>$form,
            'menu_html'=>''
        ]);
    }
}
