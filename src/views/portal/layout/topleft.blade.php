@include('woldycms::portal.common.header')
@include('woldycms::portal.common.setting')
@include('woldycms::portal.common.top')
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		<div class="sidebar-menu toggle-others fixed">
			@include('woldycms::portal.common.sidebar')	
		</div>
		<div class="main-content">
			@include($template)	
			@include('woldycms::portal.common.footer')
		</div>
		@include('woldycms::portal.common.chat')
	</div>
@include('woldycms::portal.common.bottom')
@include('woldycms::portal.common.js')