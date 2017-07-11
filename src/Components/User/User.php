<?php
namespace Woldy\Cms\Components\User;
use Woldy\Cms\Models\UserModel;
use Hash;
use Session;
class User{
    public static function getUser(){
        return Session::get('user');
    }

    public static function adminLogin($username,$password){
        if(is_numeric($username) && strlen($username)==11){
            $userinfo=UserModel::where('phone',$username)->find(1);
        }else if(strpos($username, '@')>0){
            $userinfo=UserModel::where('email',$username)->find(1);
        }else{
            $userinfo=UserModel::where('username',$username)->find(1);
        }

        if($userinfo==null || !Hash::check($password,$userinfo->password) || $userinfo['is_admin']==0){
            return false;
        }else{
           $userinfo=$userinfo->toarray();
           // $admin=[
           //  'user'=>$userinfo,
           // ];
           Session::put('admin',$userinfo);
           Session::put('user',$userinfo);
           return true;
        }
    }

    public static function userLogin($username,$password){
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
           // $admin=[
           //  'user'=>$userinfo,
           // ];
           if($userinfo['is_admin']==1){
             Session::put('admin',$userinfo);
           }

           Session::put('user',$userinfo);
           return true;
        }
    }


    public static  function logout(){
      Session::put('user','');
      Session::put('admin','');
    }
}
