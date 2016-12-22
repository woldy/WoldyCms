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

class mItemController extends Controller
{

    public function getList($table){

        $columns=DB::select("show full columns from $table");


        
        $mTable=new BasicModel($table);
        $list=$mTable->get()->toarray();

        return Tpl::view('mitem.list','admin',[
                'columns'=>$columns,
                'list'=>$list,
                'table'=>$table
            ]);
        //var_dump($data);
    }



}
