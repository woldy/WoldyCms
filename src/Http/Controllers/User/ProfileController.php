<?php
namespace Woldy\Cms\Http\Controllers\User;
use App\Http\Requests;
use Woldy\Cms\Http\Controllers\Controller;
use Tpl;
class ProfileController extends Controller
{
    public function index(){
    	//Menu::show();
    	return Tpl::view('index.profile','user');
    	//return view("woldycms::admin.admin");
    }

    public static function test(){
    	echo 'test';
    }
}
