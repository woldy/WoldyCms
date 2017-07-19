  $("#submit").click(function(){
    if($("#email").val()==""){
     malert("你倒是填邮箱啊！不填邮箱咋登陆？");
     return false;
    }
    var email=$("#email").val();
    if(!email.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,6}){1,2})$/)){
     malert("确定你填的是邮箱？在逗我么");
     $("#email1").focus();
	 return false;
    }




    if($("#password1").val()==''){
     malert("密码还是要有的，你看我都不限制弱口令了。。");
     return false;
    }

    if($("#password1").val()!=$("#password2").val()){
     $('body').shake(50, 10, 400);
     setTimeout("malert(\"和你说过了，第二次密码输错屏幕会炸。。  \")",2000);
     return false;
    }


    $.ajax({
		url: "",
		method: 'POST',
		dataType: 'json',
		data: {
			email: $("#email").val(),
			nickname: $("#nickname").val(),
			phone: $("#phone").val(),
			password: $("#password").val(),
			verify: $("#verify").val(),
			_token:token
		},
		success: function(data)
		{
			if(data.errcode==0){
				window.location.href = data.url;
			}else{
				malert(data.errmsg);
			}
		}
	});

 });
