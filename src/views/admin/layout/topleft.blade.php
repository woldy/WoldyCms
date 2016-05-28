@include('woldycms::admin.common.header')
@include('woldycms::admin.common.setting')
@include('woldycms::admin.common.top')
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		<div class="sidebar-menu toggle-others fixed">
			@include('woldycms::admin.common.sidebar')	
		</div>
		<div class="main-content">
			@include($template)	
			@include('woldycms::admin.common.footer')
		</div>
		@include('woldycms::admin.common.chat')
	</div>
@include('woldycms::admin.common.bottom')
@include('woldycms::admin.common.js')