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
use Cache;
use Menu;
use Tpl;
use Form;
use DB;
//use Illuminate\Database\Schema\Blueprint;

class CacheController extends Controller
{
  public function getList(){
      $cache_list=Cache::get('cache_list');

	  return Tpl::view('cache.list','admin',[
	      'list'=>$cache_list
	  ]);
  }
}
