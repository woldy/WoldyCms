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
											<th>id</th>
											<th data-priority="1">数据表</th>
											<th data-priority="3">别名</th>
											<th data-priority="1">配置项</th>
											<th data-priority="3">操作</th>

										</tr>
									</thead>
									<tbody>
									@foreach ($list as $item)
										<tr>
											<th>{{$item['id']}}</th>
											<td>{{$item['table']}}</td>
											<td>{{$item['alias']}}</td>
											<td></td>
											<td><a href="">数据列表</a>&nbsp;|&nbsp;<a href="/admin/model/edit/{{$item['table']}}">模型编辑</a></td>
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

@stop