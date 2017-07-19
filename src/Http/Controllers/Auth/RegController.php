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
      $phone=Input::get('phone');
      $nickname=Input::get('nickname');



      $checkhas=User::checkHas($email,$phone,$nickname);
      if($checkhas){
        return response()->json($checkhas);
      }

      $checkwrong=User::checkWrong($email,$phone,$nickname);
      if($checkwrong){
        return response()->json($checkwrong);
      }

      User::create($email,$phone,$nickname,$password);
      User::userLogin($email,$password);


      	$result=[
    			'errcode'=>0,
    			'errmsg'=>'ok',
    			'url'=>'/'
    		];

      //
    	// if(User::adminLogin($username,$password)){
    	// 	$result=[
    	// 		'errcode'=>0,
    	// 		'errmsg'=>'',
    	// 		'url'=>'/'
    	// 	];
    	// }else{
    	// 	$result=[
    	// 		'errcode'=>1,
    	// 		'errmsg'=>'用户名或密码不正确！',
    	// 	];
    	// }

    	return response()->json($result);
    }


}
