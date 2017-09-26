			<!-- User Info, Notifications and Menu Bar -->
			<nav class="navbar user-info-navbar" role="navigation">

				<!-- Left links for user info navbar -->
				<ul class="user-info-menu left-links list-inline list-unstyled">

					<li class="hidden-sm hidden-xs">
						<a href="#" data-toggle="sidebar">
							<i class="fa-bars"></i>
						</a>
					</li>

@if(User::getUser() && false)
					<li class="dropdown hover-line">
						<a href="#" data-toggle="dropdown">
							<i class="fa-envelope-o"></i>
							<span class="badge badge-green">15</span>
						</a>

						<ul class="dropdown-menu messages">
							<li>
								<ul class="dropdown-menu-list list-unstyled ps-scrollbar">
									<li class="active">
										<a href="#">
											<span class="line">
												<strong>无所不能的魂大人</strong>
												<span class="light small">- 昨天</span>
											</span>

											<span class="line desc small">
												大家好，我是@无所不能的魂大人！
											</span>
										</a>
									</li>
								</ul>
							</li>

							<li class="external">
								<a href="/user/messages">
									<span>全部消息</span>
									<i class="fa-link-ext"></i>
								</a>
							</li>
						</ul>
					</li>
					<li class="dropdown hover-line">
						<a href="#" data-toggle="dropdown">
							<i class="fa-bell-o"></i>
							<span class="badge badge-purple">7</span>
						</a>

						<ul class="dropdown-menu notifications">
							<li class="top">
								<p class="small">
									<a href="#" class="pull-right">全部标记已读</a>
									您有<strong>3</strong>条新通知
								</p>
							</li>

							<li>
								<ul class="dropdown-menu-list list-unstyled ps-scrollbar">
									<li class="active notification-success">
										<a href="#">
											<i class="fa-user"></i>

											<span class="line">
												<strong>欢迎您来到woldycms</strong>
											</span>

											<span class="line small time">
												30秒前
											</span>
										</a>
									</li>
								</ul>
							</li>

							<li class="external">
								<a href="#">
									<span>全部通知</span>
									<i class="fa-link-ext"></i>
								</a>
							</li>

						</ul>
					</li>
@endif
				</ul>




				<!-- Right links for user info navbar -->
				<ul class="user-info-menu right-links list-inline list-unstyled">

					<li class="search-form"><!-- You can add "always-visible" to show make the search input visible -->

						<form method="get" action="/search">
							<input type="text" name="s" class="form-control search-field" placeholder="请输入关键词" />

							<button type="submit" class="btn btn-link">
								<i class="linecons-search"></i>
							</button>
						</form>

					</li>


					@if(empty(User::getUser()))
					<li><a href="/auth/user/reg" style="margin-top:2px;padding:30px 10px;">注册</a></li>
					<li><a style="padding:30px 0px">|</a></li>
					<li><a href="/auth/user/login" style="margin-top:2px;padding:30px 10px;">登陆</a></li>

					<li><a></a></li>
					@else
					<li class="dropdown user-profile">
						<a href="#" data-toggle="dropdown">
							<img src="{{empty(User::getUser()['avatar'])?$static_base.'/images/user-4.png':User::getUser()['avatar']}}" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
							<span>
								{{User::getUser()['nickname']??Setting::get('guest_name')}}
								<i class="fa-angle-down"></i>
							</span>
						</a>

						<ul class="dropdown-menu user-profile-menu list-unstyled">
							<li>
								<a href="/user/profile">
									<i class="fa-user"></i>
									个人资料
								</a>
							</li>
							@if(User::isAdmin())
							<li>
								<a href="/admin/index">
									<i class="fa-cog"></i>
									管理后台
								</a>
							</li>
							@endif
							<li>
								<a href="/wiki/help">
									<i class="fa-info"></i>
									使用说明
								</a>
							</li>
							<li class="last">
								<a href="{{Setting::get('logout_url')}}">
									<i class="fa-lock"></i>
									退出登陆
								</a>
							</li>
						@endif
						</ul>
					</li>

					<!-- <li>
						<a href="#" data-toggle="chat">
							<i class="fa-comments-o"></i>
						</a>
					</li> -->

				</ul>

			</nav>
