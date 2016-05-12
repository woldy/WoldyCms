<?php
namespace Woldy\Cms\Components\Form\Element;

class Native{
	public static function getText($config=[]){
		$html="<div class=\"row\"><form role=\"form\" class=\"form-horizontal\"><div class=\"form-group\">
									<label class=\"col-sm-4 control-label \" for=\"field-1\">Input</label>
									
									<div class=\"col-sm-6\">
										<input type=\"text\" class=\"form-control\" id=\"field-1\" placeholder=\"Placeholder\">
									</div>
								</div></form></div>";
		return $html;
	}

}