			<footer class="main-footer text-center">
                <div class="float-right">
                    <b>{{ __('Developed by') }}</b> rejauldu
                </div>
                <strong>{{ __('Copyright') }} © {{ __('2019') }} <a href="#">{{ config('app.name', 'Laravel') }}</a>.</strong> {{ __('All rights reserved') }}
            </footer>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		</div> <!--end of content-fluid-->
	</div><!--end of #app-->
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	<!-- Smooth Scroll -->
	<!-- Data aos -->
	<script src="{{ asset('js/aos.js') }}"></script>
	<script>AOS.init({once: true});</script>
	<!-- /Data aos -->
	<!--- Box JavaScript -->
	<script src="{{ asset('js/adminlte.min.js') }}"></script>
	<script src="{{ asset('js/smooth-scroll.js') }}"></script>
	<script src="{{ asset('js/theme.js') }}?{{ time() }}"></script>
@yield('script')
</body>
</html>