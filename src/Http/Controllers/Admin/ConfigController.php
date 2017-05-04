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

class ConfigController extends Controller
{




    public function getList($table){

        $table=addslashes($table);

        $columns=DB::select("show full columns from $table");


        return Tpl::view('model.cfglist','admin',['list'=>$columns]);
        //var_dump($data);
    }

    public function getForm($table){
        $table=addslashes($table);
        $columns=DB::select("show full columns from $table");
        return Tpl::view('model.cfgform','admin',['list'=>$columns]);
        //var_dump($data);
    }

}
