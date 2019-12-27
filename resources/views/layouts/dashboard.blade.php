@include('layouts.backend.header')
@include('layouts.backend.top-bar')
<div class="row">
	<div class="col-12 col-md-3 col-lg-2 pt-md-55">
		@include('layouts.backend.left-sidebar')
	</div>
	<div class="col-12 col-md-9 col-lg-10 pt-md-55" id="theme-content">
		@yield('content')
	</div>
</div>
@include('layouts.backend.footer')