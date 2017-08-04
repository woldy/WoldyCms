@extends($tpl_layout)
@section('content')
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">分类管理 </div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">
							<ul id="menu_edit_list" class="uk-nestable" data-uk-nestable>
                    			{!!$menu_html!!}
							</ul>
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
							{!!$listform!!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<link rel="stylesheet" href="{{$static_base}}/js/xenon/uikit/uikit.css">
<script src="{{$static_base}}/js/xenon/uikit/js/uikit.min.js"></script>
<script src="{{$static_base}}/js/xenon/uikit/js/addons/nestable.min.js"></script>
<script src="{{$static_base}}/js/xenon/jquery-validate/jquery.validate.min.js"></script>

@stop
