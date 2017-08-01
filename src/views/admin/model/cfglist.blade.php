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
											<th data-priority="1" width="14.25%">字段</th>
											<th data-priority="3" width="14.25%">说明</th>
											<th data-priority="3" width="10.25%">显示</th>
											<th data-priority="3" width="15.25%">关联模型</th>
											<th data-priority="3" width="15.25%">关联字段</th>
											<th data-priority="3" width="15.25%">展示字段</th>
											<th data-priority="3" width="14.25%">操作</th>

										</tr>
									</thead>
									<tbody>
									@foreach ($list as $item)
										<tr>
											<th>{{$item['COLUMN_NAME']}}</th>
											<td>{{$item['COLUMN_COMMENT']}}</td>
											<td>
											<input type="checkbox" name="display" id="display" checked="" class="iswitch iswitch-info"></td>
											<td><select class="form-control"><option value="">无</option>{!!$model_list_html!!}</select></td>
											<td><select class="form-control"><option>test</option></select></td>
											<td><select class="form-control"><option>test</option></select></td>
											<td>
												<a href="#" class="btn btn-success btn-sm btn-icon icon-left">上移</a>
												<a href="#" class="btn btn-orange btn-sm btn-icon icon-left">下移</a>
												<a class="btn btn-icon btn-sm btn-red">x</a>
											</td>
										</tr>
									@endforeach

									<tr>
										<th>
											<div class="form-group">
													<input type="text" name="alias" id="alias" class="form-control" placeholder="字段">
											</div>
										</th>
										<td>
											<div class="form-group">
													<input type="text" name="alias" id="alias" class="form-control" placeholder="说明">
											</div>
										</td>
										<td>
										<input type="checkbox" name="display" id="display" checked="" class="iswitch iswitch-info"></td>
										<td><select class="form-control"><option>test</option></select></td>
										<td><select class="form-control"><option>test</option></select></td>
										<td><select class="form-control"><option>test</option></select></td>
										<td>
											<a href="#" class="btn btn-info btn-sm btn-icon icon-left">添加</a>
										</td>
									</tr>

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
