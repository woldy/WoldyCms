<?php
namespace Woldy\Cms\Components\User;
use Woldy\Cms\Models\UserModel;
use Hash;
use Session;
class User{
    public static function adminLogin($username,$password){
        if(is_numeric($username) && strlen($username)==11){
            $userinfo=UserModel::where('phone',$username)->find(1);
        }else if(strpos($username, '@')>0){
            $userinfo=UserModel::where('email',$username)->find(1);
        }else{
            $userinfo=UserModel::where('username',$username)->find(1);
        }

        if($userinfo==null || !Hash::check($password,$userinfo->password)){
            return false;
        }else{
           $userinfo=$userinfo->toarray();
           $admin=[
            'user'=>$userinfo,
           ];
           Session::put('admin',$admin);
           Session::put('user',$admin);
           return true;
        }


    }
}
