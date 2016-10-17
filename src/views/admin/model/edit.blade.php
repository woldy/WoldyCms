@extends('woldycms::admin.layout.left')
@section('content')
			<div class="row">
				<div class="col-md-12">
				
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">详细列表</h3>
							
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
										 	<th data-priority="1">字段说明</th>
											<th data-priority="3">操作</th>

										</tr>
									</thead>
									<tbody>
									@foreach ($columns as $item)
										<tr>
											<th>{{$item['Field']}}</th>
											<td>{{$item['Type']}}</td>
											<td>{{$item['Comment']}}</td>
											
											<td><a class="model_edit">编辑</a> | <a class="model_del">删除</a></td>
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
							
							<form role="form" class="form-inline">
								
								<div class="form-group">
									<input type="text" class="form-control" size="25" placeholder="Username" />
								</div>
								
								<div class="form-group">
									<input type="password" class="form-control" size="25" placeholder="Password" />
								</div>
								
								<div class="form-group">
									<button class="btn btn-secondary btn-single">Sign in</button>
								</div>
								
								<div class="form-group">
									<label class="cbr-inline">
										<input type="checkbox" class="cbr" checked>
										Remember me
									</label>
								</div>
								
								<div class="form-group pull-right">
									<button class="btn btn-white btn-single">Create new account</button>
								</div>
								
							</form>
						
						</div>
					</div>
				
				</div>
			</div>

@stop