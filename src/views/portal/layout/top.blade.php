@include('woldycms::portal.common.header')
@include('woldycms::portal.common.setting')
@include('woldycms::portal.common.top')
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		<div class="main-content">
			@include($template)	
			@include('woldycms::portal.common.footer')
		</div>
		@include('woldycms::portal.common.chat')	
	</div>
@include('woldycms::portal.common.bottom')
@include('woldycms::portal.common.js')