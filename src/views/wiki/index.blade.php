@extends($tpl_layout)
@section('content')
 <style type="text/css">
.margin-tb-zero,
.markdown-body ol ol,
.markdown-body ul ol,
.markdown-body ol ul,
.markdown-body ul ul,
.markdown-body ol ul ol,
.markdown-body ul ul ol,
.markdown-body ol ul ul,
.markdown-body ul ul ul {
  margin-top: 0;
  margin-bottom: 0;
}
.markdown-body {
  font-family: "microsoft yahei","Helvetica Neue", Helvetica, "Segoe UI", Arial, freesans, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
  font-size: 16px;
  color: #333;
  line-height: 1.6;
  word-wrap: break-word;
  padding: 30px 45px;
  background: #fff;
  border: 1px solid #ddd;
  -webkit-border-radius: 0 0 3px 3px;
  border-radius: 0 0 3px 3px;
}
.markdown-body > *:first-child {
  margin-top: 0 !important;
}
.markdown-body > *:last-child {
  margin-bottom: 0 !important;
}
.markdown-body * {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.markdown-body h1,
.markdown-body h2,
.markdown-body h3,
.markdown-body h4,
.markdown-body h5,
.markdown-body h6 {
  margin-top: 1em;
  margin-bottom: 16px;
  font-weight: bold;
  line-height: 1.4;
}
.markdown-body p,
.markdown-body blockquote,
.markdown-body ul,
.markdown-body ol,
.markdown-body dl,
.markdown-body table,
.markdown-body pre {
  margin-top: 0;
  margin-bottom: 16px;
}
.markdown-body h1 {
  margin: 0.67em 0;
  padding-bottom: 0.3em;
  font-size: 2.25em;
  line-height: 1.2;
  border-bottom: 1px solid #eee;
}
.markdown-body h2 {
  padding-bottom: 0.3em;
  font-size: 1.75em;
  line-height: 1.225;
  border-bottom: 1px solid #eee;
}
.markdown-body h3 {
  font-size: 1.5em;
  line-height: 1.43;
}
.markdown-body h4 {
  font-size: 1.25em;
}
.markdown-body h5 {
  font-size: 1em;
}
.markdown-body h6 {
  font-size: 1em;
  color: #777;
}
.markdown-body ol,
.markdown-body ul {
  padding-left: 2em;
}
.markdown-body ol ol,
.markdown-body ul ol {
  list-style-type: lower-roman;
}
.markdown-body ol ul,
.markdown-body ul ul {
  list-style-type: circle;
}
.markdown-body ol ul ul,
.markdown-body ul ul ul {
  list-style-type: square;
}
.markdown-body ol {
  list-style-type: decimal;
}
.markdown-body ul {
  list-style-type: disc;
}
.markdown-body blockquote {
  margin-left: 0;
  margin-right: 0;
  padding: 0 15px;
  color: #777;
  border-left: 4px solid #ddd;
}
.markdown-body table {
  display: block;
  width: 100%;
  overflow: auto;
  word-break: normal;
  word-break: keep-all;
  border-collapse: collapse;
  border-spacing: 0;
}
.markdown-body table tr {
  background-color: #fff;
  border-top: 1px solid #ccc;
}
.markdown-body table tr:nth-child(2n) {
  background-color: #f8f8f8;
}
.markdown-body table th,
.markdown-body table td {
  padding: 6px 13px;
  border: 1px solid #ddd;
}
.markdown-body pre {
  word-wrap: normal;
  padding: 16px;
  overflow: auto;
  font-size: 85%;
  line-height: 1.45;
  background-color: #f7f7f7;
  -webkit-border-radius: 3px;
  border-radius: 3px;
}
.markdown-body pre code {
  display: inline;
  max-width: initial;
  padding: 0;
  margin: 0;
  overflow: initial;
  font-size: 100%;
  line-height: inherit;
  word-wrap: normal;
  white-space: pre;
  border: 0;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  background-color: transparent;
}
.markdown-body pre code:before,
.markdown-body pre code:after {
  content: normal;
}
.markdown-body code {
  font-family: Consolas, "Liberation Mono", Menlo, Courier, monospace;
  padding: 0;
  padding-top: 0.2em;
  padding-bottom: 0.2em;
  margin: 0;
  font-size: 85%;
  background-color: rgba(0,0,0,0.04);
  -webkit-border-radius: 3px;
  border-radius: 3px;
}
.markdown-body code:before,
.markdown-body code:after {
  letter-spacing: -0.2em;
  content: "\00a0";
}
.markdown-body a {
  color: #4078c0;
  text-decoration: none;
  background: transparent;
}
.markdown-body img {
  max-width: 100%;
  max-height: 100%;
  -webkit-border-radius: 4px;
  border-radius: 4px;
  -webkit-box-shadow: 0 0 10px #555;
  box-shadow: 0 0 10px #555;
}
.markdown-body strong {
  font-weight: bold;
}
.markdown-body em {
  font-style: italic;
}
.markdown-body del {
  text-decoration: line-through;
}
.task-list-item {
  list-style-type: none;
}
.task-list-item input {
  font: 13px/1.4 Helvetica, arial, nimbussansl, liberationsans, freesans, clean, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
  margin: 0 0.35em 0.25em -1.6em;
  vertical-align: middle;
}
.task-list-item input[disabled] {
  cursor: default;
}
.task-list-item input[type="checkbox"] {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  padding: 0;
}
.task-list-item input[type="radio"] {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  padding: 0;
}


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
/*
.main-content{
  padding: 10px 30px !important;
}*/

</style>
<div class="row">
				<div class="col-md-3">

				<div id="toc" class="tocify" style="width: 183px;"></div>

				</div>

				<div class="col-md-9  markdown-body" style="display: none;">
					<div class="edit-wp"><span class="edit">{{$author_name}}&nbsp;更新于&nbsp;{{$updated_at}}&nbsp;&nbsp;&nbsp;<a href="/wiki/edit/{{$name}}">编辑</a></span></div>


					<div class="tocify-content" >{{html_entity_decode($content)}}</div>

				</div>

</div>

<script type="text/javascript">

$(document).ready(function(){
	$(".tocify-content").html(markdown.toHTML($(".tocify-content").html()));
	$(".markdown-body").show();

	if($(".tocify-content").html().length<1000){
		$("#toc").hide();
		$(".markdown-body").removeClass('col-md-9');
	}

});


</script>


@stop
