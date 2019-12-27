<!doctype html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{ asset('css/app.css') }}">
</head>
<body>
	<div id="app"></div>
	<script src="{{ asset('js/app.js') }}?{{ time() }}"></script>
	<script>
	Echo.join('chat')
    .listen('ChatEvent', (e) => {
        console.log(e);
    });
	
</script>
</body>

</html>