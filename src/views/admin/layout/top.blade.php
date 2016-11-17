@include('woldycms::admin.common.header')
@include('woldycms::admin.common.setting')
@include('woldycms::admin.common.top')
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		<div class="main-content">
			@include($template)	
			@include('woldycms::admin.common.footer')
		</div>
		@include('woldycms::admin.common.chat')	
	</div>
@include('woldycms::admin.common.debug')
@include('woldycms::admin.common.bottom')
@include('woldycms::admin.common.js')