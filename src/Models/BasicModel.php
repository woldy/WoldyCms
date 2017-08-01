<?php
namespace Woldy\Cms\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Request;
use DB;
class BasicModel extends Model
{
    public $table = 'wcms_models';
    public $timestamps = false;
    protected $guarded=[];

	function __construct($_table='wcms_models'){
		$this->table=$_table;
	}

  public static function getList(){
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
    $models=self::all()->toArray();
    foreach ($models as $model) {
      if(in_array($model['table'],$tables)){
        $list[$model['table']]=$model;
      }
    }

      return $list;
  }

  public static function getListHtml($current=''){
    $list=self::getList();
    $html='';
    foreach ($list as $model) {
      if($model['table']==$current){
        $html.="<option value=\"{$model['table']}\" selected=\"selected\">{$model['table']}</option>";
      }else{
        $html.="<option value=\"{$model['table']}\">{$model['table']}</option>";
      }
    }
    return $html;
  }



}
