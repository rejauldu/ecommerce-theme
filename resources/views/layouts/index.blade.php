@include('layouts.front-end.header')
@include('layouts.front-end.top-bar')
<div class="row">
	<div class="col-12 pt-md-55">
		@yield('content')
	</div>
</div>
@include('layouts.front-end.footer')