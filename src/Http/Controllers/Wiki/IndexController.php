<?php
namespace Woldy\Cms\Http\Controllers\Wiki;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Woldy\Cms\Http\Controllers\Controller;
use Woldy\Cms\Models\BasicModel;
use Tpl;
use Redirect;
class IndexController extends Controller
{
	public function show($name){
		$mWiki=new BasicModel('wcms_wiki');
		$wiki=$mWiki->where('name',$name)->orderby('id','desc')->first();
		if(empty($wiki)){
			if(empty(Input::All())){
				return Redirect::to('/wiki/edit/'.$name);
			}else{
				return Redirect::to('/wiki/edit/'.$name."?".http_build_query(Input::All()));
			}
		}else{
			$wiki=$wiki->toArray();
		}
		return Tpl::view('index','wiki',
		[
			'name'=>$name,
			'author_name'=>$wiki['author_name'],
			'updated_at'=>$wiki['updated_at'],
			'content'=>$wiki['content'],
		]);
	}
}
