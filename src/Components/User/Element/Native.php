<?php
namespace Woldy\Cms\Components\Form\Element;
use Form;
class Native{



	/**
	 * 构造form表单
	 * @Author   Woldy
	 * @DateTime 2016-05-16T19:46:52+0800
	 * @return   [type]                   [description]
	 */
	public static function form($config){
		$attr=Form::attr($config['attr']);
		$html="
<div class=\"row\">
	<form role=\"form\" $attr>";
		return $html;		
	}

	/**
	 * 结束form表单
	 * @Author   Woldy
	 * @DateTime 2016-05-16T19:47:23+0800
	 * @return   [type]                   [description]
	 */
	public static function endform(){
		$token=csrf_token();
		$html="
		<input type=\"hidden\" name=\"_token\" value=\"{$token}\">
	</form>
</div>";
		return $html;
	}

	/**
	 * 生成分割线
	 * @Author   woldy
	 * @DateTime 2016-05-25T23:09:02+0800
	 * @return   [type]                   [description]
	 */
	public static function separator(){
		$html="<div class=\"form-group-separator\"></div>";
		return $html;
	}

	/**
	 * 生成文本框
	 * @Author   woldy
	 * @DateTime 2016-05-25T23:08:53+0800
	 * @param    array                    $config [description]
	 * @return   [type]                           [description]
	 */
	public static function text($config=['attr'=>[]]){
		$attr=Form::attr($config['attr']);
		$label=isset($config['label'])?$config['label']:'';
		$html="	<div class=\"form-group\" >
					<label class=\"control-label \" for=\"field-1\" >
						$label
					</label>
					<div>
							<input type=\"text\" class=\"form-control\" $attr>
					</div>
				</div>";
		return $html;
	}

	public static function button($config=['attr'=>[]]){
		$attr=Form::attr($config['attr']);
		$label=isset($config['label'])?$config['label']:'';
		$html="<div class=\"form-group\">
					<button type=\"button\" $attr >$label</button>
				</div>";
		return $html;		
	}

	public static function submit($config=['attr'=>[]]){
		$attr=Form::attr($config['attr']);
		$label=isset($config['label'])?$config['label']:'';
		$html="<div class=\"form-group\">
					<button type=\"submit\" $attr >$label</button>
				</div>";
		return $html;		
	}


	public static function hidden($config=['attr'=>[]]){
		$attr=Form::attr($config['attr']);
		$html="<input type=\"hidden\" $attr>";
		return $html;	
	}

}