@include('woldycms::wiki.common.header')
<!-- #include('woldycms::wiki.common.setting') -->
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		<div class="sidebar-menu toggle-others fixed">
			@include('woldycms::wiki.common.sidebar')	
		</div>
		<div class="main-content">	
 			@include('woldycms::wiki.common.utop')
			@include('woldycms::wiki.common.nav')
		 	@section('content')
    			<h1>default content</h1>
			@show
			@include('woldycms::wiki.common.footer')	
		</div>
		{{--@include('woldycms::wiki.common.chat')--}}
	</div>
@include('woldycms::wiki.common.debug')
@include('woldycms::wiki.common.bottom')
@include('woldycms::wiki.common.js')