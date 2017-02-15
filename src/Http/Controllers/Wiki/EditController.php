<?php
namespace Woldy\Cms\Http\Controllers\Wiki;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Woldy\Cms\Http\Controllers\Controller;
use Woldy\Cms\Models\WikiModel;
use Tpl;
use Session;
class EditController extends Controller
{
	public function store($name){
		if(session('admin')){
			WikiModel::create([
				'name'=>Input::get('name'),
				'content'=>htmlentities(Input::get('content'), ENT_COMPAT, 'utf-8'),
				'author_id'=>session('admin')['id'],
				'author_name'=>session('admin')['nickname'],
				'tags'=>''
			]);			
		}

		return $this->show($name);
	}
	
	public function show($name){
		$wiki=WikiModel::where('name',$name)->orderby('id','desc')->first();
		$static_base=Tpl::static_base('wiki');



		if(empty($wiki)){
			return Tpl::view('edit','wiki',
			[
				'name'=>$name,
				'static_base'=>$static_base,
				'updated_at'=>'',
				'content'=>'',
			]);		
		}else{
			$wiki=$wiki->toArray();
		}
		return Tpl::view('edit','wiki',
		[
			'name'=>$name,
			'static_base'=>$static_base,
			'updated_at'=>$wiki['updated_at'],
			'content'=>$wiki['content'],
		]);
	}
}
