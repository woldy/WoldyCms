<?php
namespace Woldy\Cms\Http\Controllers\Admin;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use App\Http\Requests;
use Woldy\Cms\Http\Controllers\Controller;
use Woldy\Cms\Models\ModelsModel;
use Redirect;
use Menu;
use Tpl;
use Form;
use DB;

class ModelController extends Controller
{
    public function getList(){
        
        $tables=DB::select("show tables");
        $tables=array_flatten($tables);
        $list=[];
        foreach ($tables as $table) {
        	$list[$table]=[
        		'id'=>'-',
        		'table'=>$table,
        		'alias'=>'-'
        	];
        }


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
    	dd($columns);

    }
}
