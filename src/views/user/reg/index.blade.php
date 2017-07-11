@extends('woldycms::xenon.layout.simple')
@section('content')
 <script src="{{$static_base}}/js/xenon/xenon-custom.js"></script>
<script src="{{$static_base}}/js/xenon/jquery-validate/jquery.validate.min.js"></script>




<div class="row">
				<div class="col-sm-12">

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">新用户注册</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">–</span>
									<span class="expand-icon">+</span>
								</a>
								<a href="#" data-toggle="remove">
									×
								</a>
							</div>
						</div>
						<div class="panel-body">

							<form role="form" class="form-horizontal">


                <div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">邮箱</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" id="field-1" placeholder="别乱填,要用这个登陆的">
									</div>
								</div>

                								<div class="form-group-separator"></div>

                								<div class="form-group">
                									<label class="col-sm-2 control-label" for="field-1">昵称</label>

                									<div class="col-sm-10">
                										<input type="text" class="form-control" id="field-1" placeholder="别起太长,弄乱样式直接删号">
                									</div>
                								</div>
    <div class="form-group-separator"></div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="field-2">电话</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="field-2" placeholder="不逼着你填,填的话尽量填真的,没钱给你发验证短信">
                  </div>
                </div>




								<div class="form-group-separator"></div>

								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-2">密码</label>

									<div class="col-sm-10">
										<input type="password" class="form-control" id="field-2" placeholder="自己记着点,密码找回还没做好">
									</div>
								</div>

								<div class="form-group-separator"></div>

                <div class="form-group">
									<label class="col-sm-2 control-label" for="field-2">确认</label>

									<div class="col-sm-10">
										<input type="password" class="form-control" id="field-2" placeholder="再输一遍密码">
									</div>
								</div>

                <div class="form-group">
                		<button type="button" class="btn btn-info btn-single pull-right">注册</button>
                </div>
							</form>

						</div>
					</div>

				</div>
			</div>




<script src="{{$static_base}}/js/xenon/toastr/toastr.min.js"></script>
<script type="text/javascript">
	token="<?php echo  csrf_token()?>";
</script>
@stop
