@extends($tpl_layout)
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
	 											<th>缓存名称</th>
	 											<th>写入时间</th>
	 											<th>过期时间</th>
												<th>Tags</th>
												<th>操作</th>
										</tr>
									</thead>
									<tbody>
									@foreach ($list as $key=>$item)
										<tr>
	 										<td>{{$key}}</td>
											<td>{{date('Y-m-d H:i:s',$item['created_at'])}}</td>
											<td>{{$item['minutes']}}</td>
											<td>{{$item['tags']}}</td>
											<td>
														<a href="/admin/model/config/list/wcms_access" class="btn btn-success btn-sm btn-icon icon-left">查看</a>
								
														<a href="/admin/model/config/form/wcms_access" class="btn btn-danger btn-sm btn-icon icon-left">删除</a>
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>

							</div>

						</div>

					</div>
				</div>
			</div>


<script type="text/javascript">

	jQuery(document).ready(function($){

		$(".addmodel").on('click', function(){
			$.ajax({
  				type: 'POST',
  				url: '/admin/model/addtable',
  				data: {
  					'table':$("#table").val(),
  					'alias':$("#alias").val(),
  					'_token':"<?php echo csrf_token(); ?>",
  				},
  				success: function(data){
  					location.href="";
  					console.log('added');
  				}
			});
		});

	});

	function delmodel(model){
		$.ajax({
  			type: 'POST',
  				url: '/admin/model/deltable',
  				data: {
  					'table':model,
  					'_token':"<?php echo csrf_token(); ?>",
  				},
  				success: function(data){
  					location.href="";
  					console.log('added');
  				}
		});
		console.log(model+' was deleted!');
	}

</script>



@stop
