@extends('woldycms::admin.layout.left')
@section('content')
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">菜单排序 </div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">
							<ul id="menu_edit_list" class="uk-nestable" data-uk-nestable>
                    			{!!$menu_html!!}
							</ul>
						</div>
 
					</div>
				</div>
			</div>			
		</div>

		<div  class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading"><a href="javascript:void(0)"  id="menuadd"  class="pull-right fa-plus cbr-primary"></a>菜单编辑</div>
				<div class="panel-body">
					<div class="row">
 
						<div class="col-sm-12">
							{!!$listform!!}
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>
<link rel="stylesheet" href="{{$static_base}}/assets/css/admin/menu.edit.css">
<link rel="stylesheet" href="{{$static_base}}/assets/css/xenon-components.css">
<link rel="stylesheet" href="{{$static_base}}/assets/js/woldycms/xenon/uikit/uikit.css">
<script src="{{$static_base}}/assets/js/woldycms/xenon/uikit/js/uikit.min.js"></script>
<script src="{{$static_base}}/assets/js/woldycms/xenon/uikit/js/addons/nestable.min.js"></script>
<script src="{{$static_base}}/assets/js/woldycms/xenon/jquery-validate/jquery.validate.min.js"></script>

<script type="text/javascript">
	
jQuery(document).ready(function($){
	$("#menu_edit_list").on('nestable-stop', function(ev){
		var serialized = $(this).data('nestable').serialize(),
			str = '';
		str = iterateList(serialized, 0);
		sortMenu(str);
	});


	$("#menuadd").on('click', function(){
  			$("#id").val("0");
  			$("#title").val('');
  			$("#url").val('');
  			$("#icon").val('');
  			$("#class").val('');
  			$("#submit").html("增加");  	
	});

	itemclick();
});



function iterateList(items, depth){
	var str = '';
	if(!depth)	depth = 0;
	jQuery.each(items, function(i, obj){
		str +=obj.itemId + '|' + depth
		str += '\n';
		if(obj.children){
			str += iterateList(obj.children, depth+1);
		}
	});
	return str;
}


function sortMenu(str){
	$.ajax({
  		type: 'POST',
  		url: '/admin/menu/sort',
  		data: {
  			sortstr:str,
  			'_token':"<?php echo csrf_token(); ?>",
  		},
  		success: function(data){
  			console.log('sorted');
  		}
	});
}



/**
 * 点击某一项后
 * @Author   woldy
 * @DateTime 2016-05-24T23:23:48+0800
 * @return   {[type]}                 [description]
 */
function itemclick(){
	$("body").on("click",".uk-nestable-item", function () { 
		id=$(this).parent().attr('data-item-id');
		getitem(id);
	});
}


function getitem(id){
	$.ajax({
  		type: 'GET',
  		url: '/admin/menu/item',
  		data: {
  			id:id,
  			'_token':"<?php echo csrf_token(); ?>",
  		},
  		success: function(data){
  			$("#id").val(data.id);
  			$("#title").val(data.title);
  			$("#url").val(data.url);
  			$("#icon").val(data.icon);
  			$("#class").val(data.class);
  			$("#submit").html("修改");  		}
	});
}
</script>
@stop