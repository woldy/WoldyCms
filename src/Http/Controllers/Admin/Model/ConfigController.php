<?php
namespace Woldy\Cms\Http\Controllers\Admin\Model;
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

class ConfigController extends Controller
{
  public function getList($table){
    $table=addslashes($table);
    $db=(DB::connection()->getDatabaseName());
    $columns=DB::select("select * from information_schema.columns where table_schema = '{$db}' and table_name = '{$table}';");


    $model_list_html=BasicModel::getListHtml();


    return Tpl::view('model.cfglist','admin',[
      'list'=>$columns,
      'model_list_html'=>$model_list_html
    ]);
  }
}
