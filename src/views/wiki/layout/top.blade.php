@include('index.common.header')
@include('index.common.setting')
@include('index.common.top')
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		<div class="main-content">
			@section('content')
			@include('index.common.footer')
			@show
		</div>
		@include('index.common.chat')	
	</div>
@include('index.common.debug')
@include('index.common.bottom')
@include('index.common.js')