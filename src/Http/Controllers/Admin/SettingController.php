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

class SettingController extends Controller
{
  public function index($type){
    return Tpl::view('setting.index','admin');
  }
}
