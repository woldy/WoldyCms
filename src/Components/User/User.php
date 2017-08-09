<?php
namespace Woldy\Cms\Components\User;
use Woldy\Cms\Models\UserModel;
use Hash;
use Session;
use Setting;
class User{
    public static function getUser(){
        return Session::get('user');
    }

    public static function isAdmin(){
        $user=self::getUser();
        if(!isset($user['is_admin']) || $user['is_admin']!=1){
          return false;
        }else{
          return true;
        }
    }

    public static function checkHas($email,$phone,$nickname){
      $userinfo=UserModel::where('email',$email)->first();
      if(!empty($userinfo)){
        return[
                'errcode'=>1,
                'errmsg'=>'有人用你的邮箱注册过了，真的不是你吗？',
        ];
      }
      $userinfo=UserModel::where('phone',$phone)->first();
      if(!empty($userinfo)){
        return[
                'errcode'=>2,
                'errmsg'=>'有人用你的电话注册过了，真的不是你吗？',
        ];
      }
      $userinfo=UserModel::where('phone',$phone)->first();
      if(!empty($userinfo)){
        return[
                'errcode'=>3,
                'errmsg'=>'刚好有个人起了和你一样的名字，介意换一下吗？',
        ];
      }
      return false;
    }



    public static function checkWrong($email,$phone,$nickname){
      $pattern = "/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,6}){1,2})$/";
      if (!preg_match( $pattern, $email)){
        return[
                'errcode'=>4,
                'errmsg'=>'我抄的这个正则说你填的邮箱不正确。。',
        ];
      }


      if(!preg_match("/^1[34578]{1}\d{9}$/",$phone)){
        return[
                'errcode'=>5,
                'errmsg'=>'我抄的这个正则说你填的电话号码不正确。。'.$phone,
        ];
      }
    }

    public static function create($email,$phone,$nickname,$password){
      UserModel::create([
        'email'=>$email,
        'phone'=>$phone,
        'nickname'=>$nickname,
        'password'=>Hash::make($password)
      ]);
    }


    public static function adminLogin($username,$password){
        if(is_numeric($username) && strlen($username)==11){
            $userinfo=UserModel::where('phone',$username)->first();
        }else if(strpos($username, '@')>0){
            $userinfo=UserModel::where('email',$username)->first();
        }else{
            $userinfo=UserModel::where('username',$username)->first();
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

    public static function userLogin($username,$password='',$third=[]){
        if(is_numeric($username) && strlen($username)==11){
            $userinfo=UserModel::where('phone',$username)->first();
        }else if(strpos($username, '@')>0){
            $userinfo=UserModel::where('email',$username)->first();
        }else{
            $userinfo=UserModel::where('username',$username)->first();
        }




        if($userinfo!=null){
          $userinfo=$userinfo->toarray();
        }

        if($userinfo==null){
          $userinfo=[];
        }
        if((empty($userinfo) || !Hash::check($password,$userinfo['password']??'')) && empty($third)){
            return false;
        }else{
          $userinfo=array_merge($userinfo,$third);

           if(isset($userinfo['is_admin']) && $userinfo['is_admin']==1){
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
