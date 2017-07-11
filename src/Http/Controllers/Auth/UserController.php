<?php
namespace Woldy\Cms\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Closure;
use Woldy\Cms\Http\Controllers\Controller;
use Tpl;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use User;
class UserController extends Controller
{
    public function index(){
    	return Tpl::view('login.index','user');
    }

    public static function store(){
    	$username=Input::get('username');
    	$password=Input::get('password');
    	if(User::adminLogin($username,$password)){
    		$result=[
    			'errcode'=>0,
    			'errmsg'=>'',
    			'url'=>'/'
    		];
    	}else{
    		$result=[
    			'errcode'=>1,
    			'errmsg'=>'用户名或密码不正确！',
    		];
    	}

    	return response()->json($result);
    }


    public function logout(){
      User::logout();
      return redirect('/');
    }
}
