@extends('woldycms::admin.layout.left')
@section('content')
	<link rel="stylesheet" href="{{$static_base}}/assets/js/woldycms/xenon//uikit/vendor/codemirror/codemirror.css">
	<link rel="stylesheet" href="{{$static_base}}/assets/js/woldycms/xenon//uikit/uikit.css">
	<link rel="stylesheet" href="{{$static_base}}/assets/js/woldycms/xenon//uikit/css/addons/uikit.almost-flat.addons.min.css">
	<style type="text/css">
		.main-content{
			padding: 0 30px !important;
		}
	</style>


<div class="row">
 			<h3 class="text-gray">
				Wiki页编辑(<a href="/wiki/{{$name}}" class="text-info">查看</a>) <br />
	<!-- 			<small class="text-muted"></small> -->
			</h3>
			
			
			<br />
			
			<form role="form" method="post" action="">
				
 
				
				<div class="form-group">
					<textarea class="form-control" name="content">{!!$content!!}</textarea>
						
				</div>
				<input type="hidden" name="name" value="{{$name}}" />
				{!! csrf_field() !!}
	

				<div class="form-group pull-right">
					<button class="btn btn-primary btn-single">提交</button>
				</div>
			</form>
			
			
			<br />

 
 </div>
 	<script src="{{$static_base}}/assets/js/woldycms/xenon/uikit/vendor/codemirror/codemirror.js"></script>
	<script src="{{$static_base}}/assets/js/woldycms/xenon/uikit/vendor/marked.js"></script>
	<script src="{{$static_base}}/assets/js/woldycms/xenon/uikit/js/uikit.min.js"></script>
	<script src="{{$static_base}}/assets/js/woldycms/xenon/uikit/js/addons/htmleditor.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
	 		var htmleditor = $.UIkit.htmleditor($('textarea'), {markdown:true,height:$(window).height()-270});
		});	
	</script>
@stop
