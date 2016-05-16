<?php
namespace Woldy\Cms\Components\Form\Element;

class Native{
	/**
	 * 构造form表单
	 * @Author   Woldy
	 * @DateTime 2016-05-16T19:46:52+0800
	 * @return   [type]                   [description]
	 */
	public function form(){
		$html="<div class=\"row\">
					<form role=\"form\" class=\"form-horizontal\" $attr>
				";
		return $html;		
	}

	/**
	 * 结束form表单
	 * @Author   Woldy
	 * @DateTime 2016-05-16T19:47:23+0800
	 * @return   [type]                   [description]
	 */
	public function endform(){
		$html="		</form>
				</div>";
		return $html;		
	}

	public function separator(){
		$html="<div class=\"form-group-separator\"></div>";
	}

	public function test($config=[]){
		$attr=Form::buildAttr();
		$html="	<div class=\"form-group\">
					<label class=\"col-sm-4 control-label \" for=\"field-1\">
						Input
					</label>
					<div class=\"col-sm-6\">
							<input type=\"text\" $attr>
					</div>
				</div>";
		return $html;
	}

}