<?php
namespace Woldy\Cms\Http\Controllers\Portal;
use App\Http\Requests;
use Woldy\Cms\Http\Controllers\Controller;
use Tpl;
class IndexController extends Controller
{
    public function getIndex(){
    	return Tpl::view('index.index');
    }

 
}
