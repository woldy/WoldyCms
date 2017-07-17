function malert(text){
	title= arguments[1] ? arguments[1] : '提示';
	$('.modal-body').html(text);
	$('.modal-title').html(title);
	$('#modal').modal('show', {backdrop: 'fade'});
}