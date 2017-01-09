<?php
namespace Woldy\Cms\Http\Controllers\Portal;
use App\Http\Requests;
use Woldy\Cms\Http\Controllers\Controller;
use Tpl;
class IndexController extends Controller
{
    public function index(){
    	echo 'hello woldy!';
    	//return Tpl::view('index.index');
    }

 
}
