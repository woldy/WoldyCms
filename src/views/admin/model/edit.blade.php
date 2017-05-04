@extends('woldycms::admin.layout.left')
@section('content')
			<div class="row">
				<div class="col-md-12">

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">模型编辑：{{$table}}</h3>

							<div class="panel-options">
								<a href="#">
									<i class="linecons-cog"></i>
								</a>

								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>

								<a href="#" data-toggle="reload">
									<i class="fa-rotate-right"></i>
								</a>

								<a href="#" data-toggle="remove">
									&times;
								</a>
							</div>
						</div>
						<div class="panel-body">

							<div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">

								<table cellspacing="0" class="table table-small-font table-bordered table-striped">
									<thead>
										<tr>
											<th>字段名</th>
											<th data-priority="1">字段类型</th>
											<th data-priority="1">字段长度</th>
											<th data-priority="1">小数位</th>
										 	<th data-priority="1">字段说明</th>
											<th data-priority="3">操作</th>

										</tr>
									</thead>
									<tbody>
									@foreach ($columns as $item)
										<tr>
											<th>{{$item['COLUMN_NAME']}}</th>
											<td>{{$item['DATA_TYPE']}}</td>
											<td>{{$item['CHARACTER_MAXIMUM_LENGTH']??$item['CHARACTER_OCTET_LENGTH']??0}}</td>
											<td>{{$item['NUMERIC_SCALE']??0}}</td>
											<td>{{$item['COLUMN_COMMENT']}}</td>

											<td><a class="model_edit btn btn-info btn-sm btn-icon icon-left">编辑</a>
												 <a class="model_del  btn btn-danger btn-sm btn-icon icon-left">删除</a></td>
										</tr>
									@endforeach
									</tbody>
								</table>

							</div>

							<script type="text/javascript">
							// This JavaScript Will Replace Checkboxes in dropdown toggles
							jQuery(document).ready(function($)
							{
								setTimeout(function()
								{
									$(".checkbox-row input").addClass('cbr');
									cbr_replace();
								}, 0);
							});
							</script>


						</div>

					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-sm-12">

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">字段属性</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								<a href="#" data-toggle="remove">
									&times;
								</a>
							</div>
						</div>
						<div class="panel-body">
						{!!$form!!}
						</div>
					</div>

				</div>
			</div>



<script type="text/javascript">
$(document).ready(function(){
	$.validator.addMethod("echar", function (value, element) {
	    return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
	}, "只能是英文和字母！");

	setTimeout(function(){$('#filedname').rules('add', {required: true,echar:true}); },1000);

});

</script>
@stop
