	<div class="settings-pane">

		<a href="#" data-toggle="settings-pane" data-animate="true">
			&times;
		</a>

		<div class="settings-pane-inner">

			<div class="row">

				<div class="col-md-4">

					<div class="user-info">

						<div class="user-image">
							<a href="extra-profile.html">
								<img src="{{$static_base}}/images/user-2.png" class="img-responsive img-circle" />
							</a>
						</div>

						<div class="user-details">

							<h3>
								<a href="extra-profile.html">{{User::getUser()['name']??'造物神'}}</a>

								<!-- Available statuses: is-online, is-idle, is-busy and is-offline -->
								<span class="user-status is-online"></span>
							</h3>

							<p class="user-title">Web Developer</p>

							<div class="user-links">
								<a href="/user/profile" class="btn btn-primary">个人资料</a>
								<a href="/logout" class="btn btn-success">更新设置</a>
							</div>

						</div>

					</div>

				</div>

				<div class="col-md-8 link-blocks-env">

					<div class="links-block left-sep">
						<h4>
							<span>通知</span>
						</h4>

						<ul class="list-unstyled">
							<li>
								<input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk1" />
								<label for="sp-chk1">消息</label>
							</li>
							<li>
								<input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk2" />
								<label for="sp-chk2">事件</label>
							</li>
							<li>
								<input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk3" />
								<label for="sp-chk3">更新</label>
							</li>
						</ul>
					</div>

					<div class="links-block left-sep">
						<h4>
							<a href="#">
								<span>帮助中心</span>
							</a>
						</h4>

						<ul class="list-unstyled">
							<li>
								<a href="#">
									<i class="fa-angle-right"></i>
									使用帮助
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa-angle-right"></i>
									反馈建议
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa-angle-right"></i>
									联系我们
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa-angle-right"></i>
									服务条款
								</a>
							</li>
						</ul>
					</div>

				</div>

			</div>

		</div>

	</div>
