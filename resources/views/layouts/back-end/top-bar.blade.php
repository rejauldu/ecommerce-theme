<div class="row">
	<div class="d-none d-md-flex col-md-12 navbar navbar-theme fixed-top navbar-inverse">
		<div class="row">
			<div class="col-md-3 col-lg-2">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link text-white py-0" href="{{ url('/') }}"><image src="{{ asset('assets/logo.jpg') }}" id="logo" /></a>
					</li>
				</ul>
			</div>
			<div class="col-md-9 col-lg-10">
				<!-- Topbar Navbar -->
				<ul class="navbar-nav navbar-expand-md ml-auto py-0 flex-end">
					@guest
						<li class="nav-item">
							<a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
						<div class="topbar-divider d-none d-sm-block"></div>
						@if (Route::has('register'))
							<li class="nav-item">
								<a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
							</li>
						@endif
					@else
					<div class="topbar-divider d-none d-sm-block"></div>
					<li>
						
					</li>
					<!-- Nav Item - Alerts -->
					<li class="nav-item dropdown no-arrow mx-1 transition">
						<a class="nav-link dropdown-toggle text-white" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-bell"></i>
							<!-- Counter - Alerts -->
							<span class="badge badge-danger badge-counter">3+</span>
						</a>
						<!-- Dropdown - Alerts -->
						<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in position-absolute" aria-labelledby="alertsDropdown">
							<h6 class="dropdown-header">{{ __('Alerts Center') }}</h6>
							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3"><div class="icon-circle bg-primary"><i class="fas fa-file-alt text-white"></i></div></div>
								<div><div class="small text-gray-500">{{ __('December 12, 2019') }}</div><span class="font-weight-bold">{{ __('A new monthly report is ready to download!') }}</span></div>
							</a>
							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3"><div class="icon-circle bg-primary"><i class="fas fa-file-alt text-white"></i></div></div>
								<div><div class="small text-gray-500">{{ __('December 12, 2019') }}</div><span class="font-weight-bold">{{ __('A new monthly report is ready to download!') }}</span></div>
							</a>
							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3"><div class="icon-circle bg-primary"><i class="fas fa-file-alt text-white"></i></div></div>
								<div><div class="small text-gray-500">{{ __('December 12, 2019') }}</div><span class="font-weight-bold">{{ __('A new monthly report is ready to download!') }}</span></div>
							</a>
							<a class="dropdown-item text-center small text-gray-500" href="#">{{ __('Show All Alerts') }}</a>
						</div>
					</li>
					<div class="topbar-divider d-none d-sm-block"></div>
					<!-- Nav Item - Messages -->
					<li class="nav-item dropdown mx-1">
						<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown">
							<i class="fa fa-envelope"></i>
							<!-- Counter - Messages -->
							<span class="badge badge-danger badge-counter">7</span>
						</a>
						<!-- Dropdown - Messages -->
						<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in position-absolute">
							<h6 class="dropdown-header">{{ __('Message Center') }}</h6>
							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="dropdown-list-image mr-3">
									<img class="rounded-circle" src="https://1.bp.blogspot.com/-AjSuS7Fj2OM/XQNd9msZPlI/AAAAAAAABGQ/DWim3MFS_gco5Hb671D1BLNkrV152gKGgCK4BGAYYCw/s80/IMG_0328.JPG" alt="">
									<div class="status-indicator bg-success"></div>
								</div>
								<div class="font-weight-bold">
									<div class="text-truncate">{{ __('Hi there! I am wondering if you can help me with a problem Ive been having.') }}</div>
									<div class="small text-gray-500">Emily Fowler · 58m</div>
								</div>
							</a>
							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="dropdown-list-image mr-3">
									<img class="rounded-circle" src="https://1.bp.blogspot.com/-AjSuS7Fj2OM/XQNd9msZPlI/AAAAAAAABGQ/DWim3MFS_gco5Hb671D1BLNkrV152gKGgCK4BGAYYCw/s80/IMG_0328.JPG" alt="">
									<div class="status-indicator bg-success"></div>
								</div>
								<div class="font-weight-bold">
									<div class="text-truncate">{{ __('Hi there! I am wondering if you can help me.') }}</div>
									<div class="small text-gray-500">Emily Fowler · 58m</div>
								</div>
							</a>
							<a class="dropdown-item text-center small text-gray-500" href="#">{{ __('Read More Messages') }}</a>
						</div>
					</li>
					<div class="topbar-divider d-none d-sm-block"></div>
					<!-- Nav Item - User Information -->
					<li class="nav-item dropdown no-arrow">
						<a class="nav-link dropdown-toggle py-0 text-white" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="mr-2 d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
							<img class="img-profile rounded-circle" src="{{ asset('assets/profile') }}/{{ Auth::user()->photo }}">
						</a>
						<!-- Dropdown - User Information -->
						<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in position-absolute" aria-labelledby="userDropdown">
							<a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}"><i class="fa fa-user mr-2 text-gray-400"></i>{{ __('Profile') }}</a>
							<a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}"><i class="fa fa-cogs mr-2 text-gray-400"></i>{{ __('Settings') }}</a>
							<a class="dropdown-item" href="#"><i class="fa fa-list mr-2 text-gray-400"></i>{{ __('Activity Log') }}</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out mr-2"></i>{{ __('Logout') }}</a>
						</div>
					</li>
					@endguest
				</ul>
			</div>
		</div>
	</div>
</div>