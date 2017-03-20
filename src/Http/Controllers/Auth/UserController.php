<?php
namespace Woldy\Cms\Http\Controllers\Auth;
use App\Http\Requests;
use Woldy\Cms\Http\Controllers\Controller;
use Tpl;
class UserController extends Controller
{
    public function index(){
    	//Menu::show();
    	return Tpl::view('index.index','admin');
    	//return view("woldycms::admin.admin");
    }

    public static function test(){
    	echo 'test';
    }

    public function login(){
    	
    }
}
