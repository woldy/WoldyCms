@include('woldycms::xenon.common.header')
@include('woldycms::xenon.common.setting')
@include('woldycms::xenon.common.top')
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		<div class="main-content">
			@include('woldycms::xenon.common.footer')
		</div>
		@include('woldycms::xenon.common.chat')	
	</div>
@include('woldycms::xenon.common.debug')
@include('woldycms::xenon.common.bottom')
@include('woldycms::xenon.common.js')