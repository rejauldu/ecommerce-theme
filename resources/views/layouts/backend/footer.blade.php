			@auth
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
			<form id="delete-form" action="#" method="POST" style="display: none;" onsubmit="return confirm('Are you sure you want to delete?');">
				@csrf
				{{ method_field('DELETE') }}
				<input type="submit" name="submit" />
			</form>
			@endauth
	</div><!--end of #app-->
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	<!-- Smooth Scroll -->
	<!--- Box JavaScript -->
	<script src="{{ asset('js/adminlte.min.js') }}"></script>
	<script src="{{ asset('js/smooth-scroll.js') }}"></script>
	<!--- Box JavaScript -->
	<script src="{{ asset('js/theme.js') }}"></script>
	@yield('script')
</body>
</html>