@include('layouts.back-end.header')
@include('layouts.back-end.top-bar')
<div class="row">
	<div class="col-12 col-md-3 col-lg-2">
		@include('layouts.back-end.left-sidebar')
	</div>
	<div class="col-12 col-md-9 col-lg-10">
		@yield('content')
	</div>
</div>
@include('layouts.back-end.footer')