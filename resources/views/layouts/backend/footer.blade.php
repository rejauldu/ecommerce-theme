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
		<!-- Default Success Modal called from JavaScript -->
		<div class="modal fade" id="success-modal">
			<div class="modal-dialog modal-dialog-centered modal-sm">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Success</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<!-- Modal body -->
					<div class="modal-body text-success">
					Updated successfully
					</div>
					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Default Success Modal called from JavaScript -->
		<div class="modal fade" id="error-modal">
			<div class="modal-dialog modal-dialog-centered modal-sm">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Error</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<!-- Modal body -->
					<div class="modal-body text-danger">
					Error! Update error. Please try again.
					</div>
					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
					</div>
				</div>
			</div>
		</div>
	</div><!--end of #app-->
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	<!-- Smooth Scroll -->
	<!--- Box JavaScript -->
	<script src="{{ asset('js/adminlte.min.js') }}"></script>
	<script src="{{ asset('js/demo.js') }}"></script>
	<script src="{{ asset('js/smooth-scroll.js') }}"></script>
	<!--- Box JavaScript -->
	<script src="{{ asset('js/theme.js') }}"></script>
	@yield('script')
</body>
</html>