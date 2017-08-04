<?php
namespace Woldy\Cms\Http\Controllers\Admin;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use App\Http\Requests;
use Woldy\Cms\Http\Controllers\Controller;
use Woldy\Cms\Components\Util\Category;
use Woldy\Cms\Models\CategoryModel;
use Redirect;
use Menu;
use Tpl;
use Form;

class CategoryController extends Controller
{
    public function getList($pid){
//private $Native=["area","text","password","email","file","textarea","select","checkbox","radio","switch"];
    	$config=[
    		[
    			'type'=>'form',
    			'attr'=>[
           			'action'=>'/admin/category/item',
            		'method'=>'post',
            		'novalidate'=>"novalidate"
    			],
                'class'=>"validate",
    		],

        [
    			'type'=>'text',
          'label'=>'分类id',
    			'attr'=>[
           			'name'=>'id',
           			'id'=>'id',
           			'value'=>'',
                'disabled'=>'disabled'
    			],
          'p_class'=>'',
    		],


    		[
    			'type'=>'text',
    			'label'=>'名称',
    			'attr'=>[
           			'name'=>'title',
           			'id'=>'title',
           			'data-validate'=>'required',
					      'data-message-required'=>'请输入分类名称！'
    			],
          'p_class'=>'',
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
            'action'=>'/admin/category/list',
            'mothod'=>'post'
        ];

        $listform=Form::build($config);

    	//Form::init($cfgform)->show();
    	//$form->show();
    	//Menu::show();
    	return Tpl::view('category.list','admin',[
            'listform'=>$listform,
            'menu_html'=>Category::edit_list(intval($pid))
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

			CategoryModel::where('id', $id)
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
    	$item=\Woldy\Cms\Models\CategoryModel::find($id);
    	return response()->json($item);
    }


    public function getDel(){

        $id=Input::get('id');
        $item=\Woldy\Cms\Models\CategoryModel::find($id);
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

    	if($id==0){
        	$item = new \Woldy\Cms\Models\CategoryModel;
        	$item->pid=0;

            CategoryModel::create($input);
    	}else{
    		$item = \Woldy\Cms\Models\CategoryModel::find($id);
            $item->update($input);
    	}
    	return Redirect::back();
    }

    public function getEdit(){
        $config=[
            [
                'type'=>'form',
                'attr'=>[
                    'action'=>'/admin/category/item',
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
            'action'=>'/admin/category/list',
            'mothod'=>'post'
        ];

        $form=Form::build($config);
        return Tpl::view('category.edit','admin',[
            'form'=>$form,
            'menu_html'=>''
        ]);
    }
}
