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
											@foreach ($columns as $column)
												<th>{{empty($column['Comment'])?$column['Field']:$column['Comment']}}</th>
											@endforeach	

										</tr>
									</thead>
									<tbody>
									@foreach ($list as $item)
										<tr>
											@foreach($item as $key=>$value)

											<th>{!!($key=='id' || $key=='title')?"<a href=\"../show/{$table}/{$item['id']}\">$value</a>":$value!!}</th>
											@endforeach	
										</tr>
									@endforeach										
									</tbody>
								</table>
							
							</div>						
							
						</div>
					
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">新增模型</h3>
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
							<div role="form" class="form-inline">
								
								<div class="form-group">
									<input type="text" name="table" id="table" class="form-control" size="25" placeholder="表名称" value="wcms_" />
								</div>
								
								<div class="form-group">
									<input type="text" name="alias" id="alias" class="form-control" size="25" placeholder="别名" />
								</div>
								
								<div class="form-group">
									<button class="btn btn-primary btn-single addmodel">增加</button>
								</div>
								<input type="hidden" name="_token" value="<?php echo csrf_token()?>" />
								
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

