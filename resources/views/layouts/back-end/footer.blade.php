			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		</div> <!--end of content-fluid-->
	</div><!--end of #app-->
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<!-- Smooth Scroll -->
	<!-- Data aos -->
	<script src="https://narayanganjclubltd.com/js/aos.js"></script>
	<script>AOS.init({once: true});</script>
	<!-- /Data aos -->
	<script src="{{ asset('js/smooth-scroll.js') }}" defer></script>
	<script src="{{ asset('js/theme.js') }}?{{ time() }}" defer></script>
@yield('script')
</body>
</html>