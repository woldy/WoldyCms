    <div class="page-loading-overlay">
        <div class="loader-2"></div>
    </div>


 	<div class="modal fade" id="modal">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
					<h4 class="modal-title">提示</h4>
				</div>

				<div class="modal-body">
					Hello I am a Modal!
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-white modal-ok" data-dismiss="modal">确定</button>
<!-- 					<button type="button" class="btn btn-info">Save changes</button> -->
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">var csrf_token='<?php echo csrf_token();?>';</script>

    @foreach ($common_js as $js)
    <script src="{{$static_base}}{{$js}}?ver={{$version}}"></script>
    @endforeach


     <script src="{{$static_url}}{{$static['js']}}?ver={{$version}}"></script>

     @if(Session::has('msg'))
     <script>malert("{{ Session::get('msg') }}")</script>
     @endif

</body>
</html>
