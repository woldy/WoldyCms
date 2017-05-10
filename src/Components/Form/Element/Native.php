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
	<form role=\"form\" $attr class=\"{$config['class']}\">";
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
		$help=$config['help']??'';
 		$help_block=empty($help)?'':"<p class=\"help-block\">{$help}</p>";
		$label=isset($config['label'])?"<label class=\"{$config['class_label']} control-label \"  for=\"field-1\" >{$config['label']}</label>":'';
		$html="	<div class=\"form-group \" >{$label}
						<div class=\"col-sm-10\">
							<input type=\"text\" {$attr}   class=\"form-control {$config['class']}\">
							{$help_block}
						</div>
							
				</div>";
		return $html;
	}


	/**
	 * 上传文件
	 * @Author   woldy
	 * @DateTime 2016-05-25T23:08:53+0800
	 * @param    array                    $config [description]
	 * @return   [type]                           [description]
	 */
	public static function file($config=['attr'=>[]]){
		$attr=Form::attr($config['attr']);
		$label=isset($config['label'])?$config['label']:'';
		$help=$config['help']??'';
 		$help_block=empty($help)?'':"<p class=\"help-block\">{$help}</p>";
		$html="	<div class=\"form-group \" >
					<label class=\"{$config['class_label']} control-label \"  for=\"field-1\" >
						$label
					</label>
					<div class=\"{$config['class_div']}\">
							<input type=\"file\" {$attr}  class=\"form-control {$config['class']}\">
							{$help_block}
					</div>
				</div>";
		return $html;
	}

	public static function textarea($config=['attr'=>[]]){
		$attr=Form::attr($config['attr']);
		$label=isset($config['label'])?$config['label']:'';
		$html="	<div class=\"form-group \" >
					<label class=\"{$config['class_label']} control-label \"  for=\"field-1\" >
						$label
					</label>
					<div class=\"{$config['class_div']}\">
							
					<textarea type=\"text\" {$attr}  class=\"form-control {$config['class']}\"></textarea>
					</div>
				</div>";
		return $html;
	}


	public static function button($config=['attr'=>[]]){
		$attr=Form::attr($config['attr']);
		$label=isset($config['label'])?$config['label']:'';
		$html="<div class=\"form-group\">
					<button type=\"button\" $attr class=\"{$config['class']}\" >$label</button>
				</div>";
		return $html;		
	}

	public static function submit($config=['attr'=>[]]){
		$attr=Form::attr($config['attr']);
		$label=isset($config['label'])?$config['label']:'';
		$html="<div class=\"form-group\">
			<div class=\"col-sm-12\">
					<button type=\"submit\" $attr class=\"{$config['class']}\" >$label</button>
					</div>
			</div>";
		return $html;		
	}


	public static function iSwitch($config=['attr'=>[]]){
		$attr=Form::attr($config['attr']);
		$label=isset($config['label'])?$config['label']:'';
		$html="<div class=\"form-group\"><label class=\"col-sm-6 control-label\">{$label}</label>
		

		<input type=\"checkbox\" {$attr} class=\"iswitch {$config['class']}\">
		</div>";
		return $html;			
	}

	public static function hidden($config=['attr'=>[]]){
		$attr=Form::attr($config['attr']);
		$html="<input type=\"hidden\" $attr>";
		return $html;	
	}


	public static function select($config=['attr'=>[]]){
		$attr=Form::attr($config['attr']);
 		$option='';
 		$config['option']=$config['option']??[];
 		foreach ($config['option'] as $key => $value) {
 			 $option.="<option value =\"{$value}\">{$key}</option>";
 		}



		$html="<div class=\"form-group \"><select class=\"form-control\" $attr>{$option}</select></div>";


		return $html;			
	}

}