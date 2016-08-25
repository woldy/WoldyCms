<?php
namespace Woldy\Cms\Http\Controllers\Admin;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Response;
use Illuminate\Database\Schema\Blueprint;
use App\Http\Requests;
use Woldy\Cms\Http\Controllers\Controller;
use Woldy\Cms\Models\ModelsModel;
use Redirect;
use Menu;
use Tpl;
use Form;
use DB;
//use Illuminate\Database\Schema\Blueprint;

class ModelController extends Controller
{

    /**
     * 获取模型列表
     * @Author   woldy
     * @DateTime 2016-07-24T16:38:45+0800
     * @return   [type]                   [description]
     */
    public function getList(){
        

        /**
         * 获取所有tables
         * @var [type]
         */
        $tables=DB::select("show tables");
        $tables=array_flatten($tables);
        $list=[]; //列表
        foreach ($tables as $table) {
        	$list[$table]=[
        		'id'=>'-',
        		'table'=>$table,
        		'alias'=>'-'
        	];
        }

        /**
         * 对比models和tables，如果模型是mysql表，则显示表细节
         * @var [type]
         */
        $models=ModelsModel::all()->toArray();
        foreach ($models as $model) {
        	if(in_array($model['table'],$tables)){
        		$list[$model['table']]=$model;
        	}
        }
      
      	
 
    	return Tpl::admin('model.list',['list'=>$list]);
    }


    public function edit($table){
    	$columns=DB::select("show COLUMNS from $table");
        //dd($columns);
        return Tpl::admin('model.edit',['columns'=>$columns]);


    }


    /**
     * 增加数据表
     * @Author   woldy
     * @DateTime 2016-07-25T00:55:54+0800
     * @return   [type]                   [description]
     */
    public function postAddtable(){
        $name=Input::get('table');
        $alias=Input::get('alias');
        if($name != 'wcms_' && !empty($name)){
            if(!Schema::hasTable($name)){
                Schema::create($name, function (Blueprint $table) {
                    $table->increments('id');
                    $table->timestamps();
                }); 
            }
        } 
        //return redirect('/admin/model/list');
    }


    /**
     * 删除数据表
     * @Author   woldy
     * @DateTime 2016-07-25T00:55:54+0800
     * @return   [type]                   [description]
     */
    public function postDeltable(){
        $name=Input::get('table');
            if(Schema::hasTable($name)){
                Schema::drop($name); 
            }
        //return redirect('/admin/model/list');
    }
}
