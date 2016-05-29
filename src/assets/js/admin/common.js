	function call(funcName) {
        if (typeof(eval(funcName)) == "function") {
        		eval(funcName+'()');
        }
	}


	function getNew(){
		$.ajax({
			type:"GET",
			url:"/admin/order/ajaxnew",
			data:{
			},
			dataType:"json",
			success:function(data){
	 			if(data.code==0 && data.msg>0){
 					$(".order-new a").append('<span class="label label-warning pull-right">'+data.msg+'</span>');
 					$(".walert").html(data.msg);
 				}else{
 					//alert(data.msg);
 				}
			}
		});
	}

	function loadCSS(filename){
			var css=document.createElement("link");
                css.href = filename;
                css.rel = "stylesheet";
                css.type = "text/css";
                document.getElementsByTagName('head').item(0).appendChild(css);
	}