@include('woldycms::admin.common.header')
	<div class="page-container">
		@include('woldycms::admin.common.menu')
		<div class="main-content">
			@include('woldycms::admin.common.title')
			@include('woldycms::admin.'.$template)
			@include('woldycms::admin.common.footer')
		</div>
	</div>
@include('woldycms::admin.common.bottom')