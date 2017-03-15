@include('woldycms::wiki.common.header')
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		<div class="main-content">	
		 	@section('content')
    			<h1>default content</h1>
			@show
		</div>
	</div>
@include('woldycms::wiki.common.bottom')
@include('woldycms::wiki.common.js')