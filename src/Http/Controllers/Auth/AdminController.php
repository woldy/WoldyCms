<?php
namespace Woldy\Cms\Http\Controllers\Auth;
use App\Http\Requests;
use Woldy\Cms\Http\Controllers\Controller;
use Tpl;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use User;
class AdminController extends Controller
{
    public function getIndex(){
    	//Menu::show();
    	return Tpl::view('login.index','admin');
    	//return view("woldycms::admin.admin");
    }

    public static function getLogin(){
    	return Tpl::view('login.index','admin');
    }

    public static function postLogin(){
    	$username=Input::get('username');
    	$password=Input::get('password');
    	if(User::adminLogin($username,$password)){
    		$result=[
    			'errcode'=>0,
    			'errmsg'=>'',
    			'url'=>'/admin/index'
    		];
    	}else{
    		$result=[
    			'errcode'=>1,
    			'errmsg'=>'用户名或密码不正确！',
    		];
    	}

    	return response()->json($result); 
    }
}
