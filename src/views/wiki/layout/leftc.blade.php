@include('index.common.header')
@include('index.common.setting')
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		<div class="sidebar-menu toggle-others collapsed">
			@include('index.common.sidebar')	
		</div>
		<div class="main-content">
			@include('index.common.utop')	
			@include('index.common.nav')
			@include($template)	
			@include('index.common.footer')	
		</div>
		@include('index.common.chat')	
	</div>
@include('index.common.debug')
@include('index.common.bottom')
@include('index.common.js')