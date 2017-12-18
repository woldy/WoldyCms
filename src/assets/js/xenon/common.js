function malert(text){
	title= arguments[1] ? arguments[1] : '提示';
	$('.modal-body').html(text);
	$('.modal-title').html(title);
	$('#modal').modal('show', {backdrop: 'fade'});
}


$(".iframe a").each(function(){
	$(this).attr('url',$(this).attr('href'));
	$(this).attr('href','javascript:///');
});

$(".iframe a").click(function(){
	$(".main-content").css('padding','0');
	$(".main-content").html('<iframe width="100%" height="100%" src="'+$(this).attr('url')+'?iframe=true"></iframe>');
})


function GetQueryString(name)
{
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     if(r!=null)return  unescape(r[2]); return null;
}

// if(GetQueryString('iframe')=='true'){
// 	$(".sidebar-menu").remove();
// }
