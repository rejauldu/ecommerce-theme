@include('layouts.frontend.header')
@include('layouts.frontend.top-bar')
<div class="row">
	<div class="col-12 pt-md-55" id="theme-content">
		@yield('content')
	</div>
</div>
@include('layouts.frontend.footer')