<?php
namespace Woldy\Cms\Basic\Controllers\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use Woldy\Cms\Basic\Controllers\Controller;

class IndexController extends Controller
{
    public function getIndex(){
    	echo "xxsss";

    	return view("woldycms::test");
    }

    public static function test(){
    	echo 'test';
    }
}
