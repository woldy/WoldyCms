@extends($tpl_layout)
@section('content')
 <style type="text/css">
.edit-wp{
  display: block;
  width: 100%;
  height: 30px;
}

.edit{
  font-size: 12px;
  float: right;
}
.tocify-content p{
  color: #666;
}

.markdown-body {
  padding: 10px 30px;
  background: #fff;
}
</style>
<div class="row">
				<div class="col-md-3 toc-parent">

				      <div id="toc" class="tocify" style="width: 183px;"></div>

				</div>

				<div class="col-md-9  markdown-body">
					<div class="edit-wp"><span class="edit">{{$author_name}}&nbsp;更新于&nbsp;{{$updated_at}}&nbsp;&nbsp;&nbsp;@if(User::isAdmin())<a href="/wiki/edit/{{$name}}">编辑</a>@endif</span></div>


					<div class="tocify-content"  id="md2html"></div>
				</div>

</div>

<div class="md" style="display:none" width=0 height=0>{{$content}}</div>




<script type="text/javascript">
function htmlspecialchars_decode(str){
          str = str.replace(/&amp;/g, '&');
          str = str.replace(/&lt;/g, '<');
          str = str.replace(/&gt;/g, '>');
          str = str.replace(/&quot;/g, "''");
          str = str.replace(/&#039;/g, "'");
          return str;
}
$(document).ready(function(){

  //var html = marked($(".tocify-content").html());


    md2html = editormd.markdownToHTML("md2html", {
                markdown        : htmlspecialchars_decode($(".md").html()) ,//+ "\r\n" + $("#append-test").text(),
                //htmlDecode      : true,       // 开启 HTML 标签解析，为了安全性，默认不开启

                htmlDecode      : "style,script,iframe",  // you can filter tags decode
                //toc             : false,
                tocm            : true,    // Using [TOCM]
                //tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
                //gfm             : false,
                //tocDropdown     : true,
                // markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
                emoji           : true,
                taskList        : true,
                tex             : true,  // 默认不解析
                flowChart       : true,  // 默认不解析
                sequenceDiagram : true,  // 默认不解析
            });


    //$(".tocify-content").html(md2html);

	//$(".tocify-content").html(markdown.toHTML($(".tocify-content").html()));
	//$(".markdown-body").show();

	if($(".tocify-content").html().length<1000){
		$(".toc-parent").hide();
		$(".markdown-body").removeClass('col-md-9');
	}

});


</script>


@stop
