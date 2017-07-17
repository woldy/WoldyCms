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
class RegController extends Controller
{
    public function index(){
    	return Tpl::view('reg.index','user');
    }

    public static function store(){
    	$email=Input::get('email');
    	$password=Input::get('password');
      $mobile=Input::get('mobile');
      $nick_name=Input::get('nick_name');


      

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


}
