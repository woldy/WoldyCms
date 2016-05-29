<?php
namespace Woldy\Cms\Http\Controllers\Woldy;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Woldy\Cms\Http\Controllers\Controller;
class ResController extends Controller
{
	private $ext_array=[
		'css'=>'text/css',
		'js'=>'text/javascript ',
		'jpg'=>'image/jpeg',
		'png'=>'image/png',
		'gif'=>'image/gif',
		'woff'=>'font/woff',
		'ttf'=>''
	];

	private $font_path=[
		'elusive'=>'/assets/css/fonts/elusive/fonts/',
		'fontawesome-webfont'=>'/assets/css/fonts/fontawesome/fonts/',
		'glyphicons-halflings-regular'=>'/assets/css/fonts/glyphicons/',
		'linecons'=>'/assets/css/fonts/linecons/font/',
		'meteocons'=>'/assets/css/fonts/meteocons/'
	];

	// private function check_ext($ext){
	// 	if(!array_key_exists($ext,$this->ext_array)){

	// 	}
	// }

	public function res(){
		$src=Input::get('src');
		$src = explode('?', $_GET['src'])[0];
		$ext = explode('.', $src);
		$ext = end($ext);
		if(array_key_exists($ext,$this->ext_array)){
			if(file_exists(__DIR__.'/../../../'.$src)){
				$result=file_get_contents(__DIR__.'/../../../'.$src);
				return response($result, '200')->header('Content-Type',$this->ext_array[$ext]);
			}
		}
		return abort(404);
	}

    public function font($font){
    	$fontname=substr($font,0, strrpos($font,'.'));
    	if(array_key_exists($fontname,$this->font_path)){
    		$src=$this->font_path[$fontname].$font;
    		if(file_exists(__DIR__.'/../../../'.$src)){
				$result=file_get_contents(__DIR__.'/../../../'.$src);
				return response($result, '200')->header('Content-Type','application/octet-stream');
			}else{
				dd(__DIR__.'/../../../'.$src);
			}
    	}
    	return abort(404);
    }




}
