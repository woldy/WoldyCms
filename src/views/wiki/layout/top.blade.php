@include('woldycms::wiki.common.header')
@include('woldycms::wiki.common.setting')
@include('woldycms::wiki.common.top')
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		<div class="main-content">
			@section('content')
			@include('woldycms::wiki.common.footer')
			@show
		</div>
		@include('woldycms::wiki.common.chat')	
	</div>
@include('woldycms::wiki.common.debug')
@include('woldycms::wiki.common.bottom')
@include('woldycms::wiki.common.js')