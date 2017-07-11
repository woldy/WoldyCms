@extends('woldycms::xenon.layout.simple')
@section('content')
 <script src="{{$static_base}}/js/xenon/xenon-custom.js"></script>
<script src="{{$static_base}}/js/xenon/jquery-validate/jquery.validate.min.js"></script>


<div class="page-body login-page">

	<div class="login-container">

		<div class="row">

			<div class="col-sm-6">
				<!-- Errors container -->
				<div class="errors-container">


				</div>

				<!-- Add class "fade-in-effect" for login form effect -->
				<form method="post" role="form" id="login" class="login-form fade-in-effect">

					<div class="login-header">
						<a href="dashboard-1.html" class="logo">
							<img src="{{$logo2x}}" alt="" width="180" />
							<span>用户登录</span>
						</a>

						<p>你有权保持沉默，但你所提交的每个字符，都将成为呈堂证供！</p>
					</div>


					<div class="form-group">
						<label class="control-label" for="username">用户名/邮箱/手机</label>
						<input type="text" class="form-control input-dark" name="username" id="username" autocomplete="off" />
					</div>

					<div class="form-group">
						<label class="control-label" for="passwd">密码</label>
						<input type="password" class="form-control input-dark" name="password" id="password" autocomplete="off" />
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-dark  btn-block text-left ">
							<i class="fa-lock"></i>
							登录
						</button>
					</div>

					<div class="login-footer">
						<a href="/auth/user/reg">用户注册</a>
            &nbsp;|&nbsp;
            <a href="javascript:alert('忘了就忘了吧，反正里面也没钱。')">找回密码</a>
<!-- 						<div class="info-links">
							<a href="#">联系我们</a>
						</div> -->

					</div>

				</form>

				<!-- External login -->
<!-- 				<div class="external-login">
					<a href="#" class="facebook">
						<i class="fa-facebook"></i>
						Facebook Login
					</a>


					<a href="#" class="twitter">
						<i class="fa-twitter"></i>
						Login with Twitter
					</a>

					<a href="#" class="gplus">
						<i class="fa-google-plus"></i>
						Login with Google Plus
					</a>

				</div> -->

			</div>

		</div>

	</div>

</div>
<script src="{{$static_base}}/js/xenon/toastr/toastr.min.js"></script>
<script type="text/javascript">
	token="<?php echo  csrf_token()?>";
</script>
@stop
