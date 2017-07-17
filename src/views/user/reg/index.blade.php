@extends('woldycms::xenon.layout.simple')
@section('content')
 <script src="{{$static_base}}/js/xenon/xenon-custom.js"></script>
<script src="{{$static_base}}/js/xenon/jquery-validate/jquery.validate.min.js"></script>
<script>
jQuery.fn.shake = function (intShakes /*Amount of shakes*/, intDistance /*Shake distance*/, intDuration /*Time duration*/) {
    this.each(function () {
        var jqNode = $(this);
        jqNode.css({ position: 'relative' });
        for (var x = 1; x <= intShakes; x++) {
            jqNode.animate({ left: (intDistance * -1) }, (((intDuration / intShakes) / 4)))
            .animate({ left: intDistance }, ((intDuration / intShakes) / 2))
            .animate({ left: 0 }, (((intDuration / intShakes) / 4)));
        }
    });
    return this;
}
</script>



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
									<label class="col-sm-2 control-label"  >邮箱</label>

									<div class="col-sm-10">
										<input type="text" class="form-control"  id="email"  name="email" placeholder="别乱填,要用这个登陆的">
									</div>
								</div>

                								<div class="form-group-separator"></div>

                								<div class="form-group">
                									<label class="col-sm-2 control-label">昵称</label>

                									<div class="col-sm-10">
                										<input type="text" class="form-control" id="nick_name"  name="nick_name" placeholder="别起太长,弄乱样式直接删号">
                									</div>
                								</div>
    <div class="form-group-separator"></div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="field-2">电话</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="mobile"  name="mobile" placeholder="尽量填真的,没钱给你发验证短信">
                  </div>
                </div>




								<div class="form-group-separator"></div>

								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-2">密码</label>

									<div class="col-sm-10">
										<input type="password" class="form-control" id="password1"  name="password1"  placeholder="自己记着点,密码找回还没做好">
									</div>
								</div>

								<div class="form-group-separator"></div>

                <div class="form-group">
									<label class="col-sm-2 control-label" for="field-2">确认</label>

									<div class="col-sm-10">
										<input type="password" class="form-control" id="password2"  name="password2" placeholder="再输一遍密码,输错屏幕会炸">
									</div>
								</div>


              <div class="form-group-separator"></div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="field-2">验证码</label>

                <div class="col-sm-6">
                  <input type="text" class="form-control" id="verify"  name="verify" placeholder="算了,不验证了,你们随意写脚本注册,快帮我刷刷用户量">
                </div>

                <div class="col-sm-4">
                  <img src="{!!Captcha::src()!!}" />
                </div>
              </div>


                <div class="form-group">
                		<button type="button" id="submit" class="btn btn-info btn-single pull-right">注册</button>
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
