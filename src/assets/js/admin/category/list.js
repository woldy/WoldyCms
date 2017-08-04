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
  			$("#submit").html("增加");  	
	});

	itemclick();

  $(".fa-trash").click(function(e){
        id=$(this).parent().parent().attr('data-item-id');
        delitem(id);
        e.stopPropagation();
  });

});



function delitem(id){
  $.ajax({
      type: 'GET',
      url: '/admin/category/del',
      data: {
        'id':id,
        '_token':token,
      },
      success: function(data){
        window.location.reload();
      }
  });
}




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
  		url: '/admin/category/sort',
  		data: {
  			sortstr:str,
  			'_token':token,
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
  		url: '/admin/category/item',
  		data: {
  			id:id,
  			'_token':"<?php echo csrf_token(); ?>",
  		},
  		success: function(data){
  			$("#id").val(data.id);
  			$("#title").val(data.title);
   			$("#submit").html("修改");  

        if(data.enable=='off'){
          $("#enable").removeAttr('checked');
        }else{
          $("#enable").attr('checked','checked');
        }

        if(data.display=='off'){
          $("#display").removeAttr('checked');
        }else{
          $("#display").attr('checked','checked');
        }

      }
	});
}