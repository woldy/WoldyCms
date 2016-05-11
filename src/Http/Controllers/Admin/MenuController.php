<?php
namespace Woldy\Cms\Http\Controllers\Admin;
use App\Http\Requests;
use Woldy\Cms\Http\Controllers\Controller;
use Tpl;
class MenuController extends Controller
{
    public function getList(){
    	//Menu::show();
    	return Tpl::admin('menu.list');
    	//return view("woldycms::admin.admin");
    }
}
