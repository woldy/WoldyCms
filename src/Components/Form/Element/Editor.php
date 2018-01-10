<?php
namespace Woldy\Cms\Components\Form\Element;
use Form;
class Editor{


	public static function ueditor($config=['attr'=>[]]){
		$attr=Form::attr($config['attr']??'');
		$label=isset($config['label'])?$config['label']:'';
		$html='	<div class=\"form-group \" ><script id="'.($config['attr']['id']??'ueditor').'" name="content" type="text/plain"></script></div>
		    <script type="text/javascript">
        		var ue = UE.getEditor("'.($config['attr']['id']??'ueditor').'",{
        			initialFrameWidth:"100%",
        			initialFrameHeight:"600"
        		});
   			 </script>

    		';
		return $html;
	}

}
