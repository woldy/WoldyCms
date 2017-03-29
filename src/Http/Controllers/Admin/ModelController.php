<?php
namespace Woldy\Cms\Http\Controllers\Admin;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Response;
use Illuminate\Database\Schema\Blueprint;
use App\Http\Requests;
use Woldy\Cms\Http\Controllers\Controller;
use Woldy\Cms\Models\BasicModel;
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
        $models=BasicModel::all()->toArray();
        foreach ($models as $model) {
        	if(in_array($model['table'],$tables)){
        		$list[$model['table']]=$model;
        	}
        }
      
      	
 
    	return Tpl::view('model.list','admin',['list'=>$list]);
    }


    public function edit($table){
    	$columns=DB::select("show full columns from $table");
        //dd($columns);
        return Tpl::view('model.edit','admin',['columns'=>$columns]);


    }


    public function getShow($table){

        $columns=DB::select("show full columns from $table");
        
        $table=new BasicModel($table);
        $data=$table->get()->toarray();

        return Tpl::view('model.show','admin',['columns'=>$columns]);
        //var_dump($data);
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
                DB::statement("ALTER TABLE `{$name}` MODIFY COLUMN `id` int COMMENT '行ID'");
                DB::statement("ALTER TABLE `{$name}` MODIFY COLUMN `created_at` timestamp COMMENT '创建时间'");
                DB::statement("ALTER TABLE `{$name}` MODIFY COLUMN `updated_at` timestamp COMMENT '更新时间'");
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
