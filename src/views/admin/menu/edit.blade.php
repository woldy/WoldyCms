@extends('woldycms::admin.layout.left')
@section('content')
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">菜单分类</div>
				<div class="panel-body">
					<div class="row">
					<div class="col-sm-12">
					
		 
					
					<table class="table table-model-2 ">
						<thead>
							<tr>
								<th>id</th>
								<th>菜单名称</th>
 
								<th>操作</th>
					 
						</tr></thead>
						
						<tbody>
							<tr>
								<td></td>
								<td>春节礼品发放</td>
			 
								<td class="text-info">
									<a class="text-info" href="/app/api/53990339">修改</a> | 
									<a class="text-info" href="/app/edit/53990339">删除</a>
								</td>
								 
								
							</tr>
						</tbody>
						</table>
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
							{!!$form!!}
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>
<link rel="stylesheet" href="{{$static_base}}/assets/css/xenon-components.css">
<link rel="stylesheet" href="{{$static_base}}/js/xenon/uikit/uikit.css">
<script src="{{$static_base}}/js/xenon/uikit/js/uikit.min.js"></script>
<script src="{{$static_base}}/js/xenon/uikit/js/addons/nestable.min.js"></script>
<script src="{{$static_base}}/js/xenon/jquery-validate/jquery.validate.min.js"></script>

@stop