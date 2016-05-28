    <div class="page-loading-overlay">
        <div class="loader-2"></div>
    </div>
 
    @foreach ($common_js as $js)
    <script src="{{$static_url}}{{$js}}?ver={{$version}}"></script>
    @endforeach



</body>
</html>