<?php
namespace Woldy\Cms\Http\Controllers\Admin;
use App\Http\Requests;
use Woldy\Cms\Http\Controllers\Controller;
use Tpl;
class IndexController extends Controller
{
    public function getIndex(){
    	//Menu::show();
    	return Tpl::admin('index.index');
    	//return view("woldycms::admin.admin");
    }

    public static function test(){
    	echo 'test';
    }
}
