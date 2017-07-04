@include('woldycms::xenon.common.header')
@include('woldycms::xenon.common.setting')
@include('woldycms::xenon.common.top')	
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		<div class="sidebar-menu toggle-others collapsed">
			@include('woldycms::xenon.common.sidebar')	
		</div>
		<div class="main-content">
			@include($template)	
			@include('woldycms::xenon.common.footer')
		</div>
		@include('woldycms::xenon.common.chat')	
	</div>
@include('woldycms::xenon.common.debug')
@include('woldycms::xenon.common.bottom')
@include('woldycms::xenon.common.js')