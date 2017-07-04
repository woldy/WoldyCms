@include('woldycms::xenon.common.header')
@include('woldycms::xenon.common.setting')
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		<div class="sidebar-menu toggle-others fixed">
			@include('woldycms::xenon.common.sidebar')
		</div>
		<div class="main-content">
			@include('woldycms::xenon.common.utop')
			@include('woldycms::xenon.common.nav')
		 	@section('content')
    			<h1>default content</h1>
			@show
			@include('woldycms::xenon.common.footer')
		</div>
		{{--@include('woldycms::xenon.common.chat')--}}
	</div>
@include('woldycms::xenon.common.debug')
@include('woldycms::xenon.common.bottom')
@include('woldycms::xenon.common.js')
