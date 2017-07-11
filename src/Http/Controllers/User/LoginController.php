<?php
namespace Woldy\Cms\Http\Controllers\User;
use App\Http\Requests;
use Woldy\Cms\Http\Controllers\Controller;
use Tpl;
class LoginController extends Controller
{
    public function index(){
        return Tpl::view('login.index','user');
    }


}
