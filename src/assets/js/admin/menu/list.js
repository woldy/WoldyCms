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
        $("#navtitle").val('');
        $("#seotitle").val('');
        $("#navtext").val('');
        $("#seotext").val('');
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
      url: '/admin/menu/del',
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
  		url: '/admin/menu/sort',
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
  		url: '/admin/menu/item',
  		data: {
  			id:id,
  			'_token':token,
  		},
  		success: function(data){
  			$("#id").val(data.id);
  			$("#title").val(data.title);
  			$("#url").val(data.url);
  			$("#icon").val(data.icon);
  			$("#class").val(data.class);
        $("#navtitle").val(data.navtitle);
        $("#seotitle").val(data.seotitle);
        $("#navtext").val(data.navtext);
        $("#seotext").val(data.seotext);

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