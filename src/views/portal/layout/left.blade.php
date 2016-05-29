@include('woldycms::portal.common.header')
@include('woldycms::portal.common.setting')
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		<div class="sidebar-menu toggle-others fixed">
			@include('woldycms::portal.common.sidebar')	
		</div>
		<div class="main-content">	
			@include('woldycms::portal.common.utop')
			@include('woldycms::portal.common.nav')
 				@section('content')
    				<h1>default content</h1>
				@show
			@include('woldycms::portal.common.footer')	
		</div>
		{{--@include('woldycms::portal.common.chat')--}}
	</div>
@include('woldycms::portal.common.bottom')
@include('woldycms::portal.common.js')