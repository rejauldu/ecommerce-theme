<header class="main-header">
	<!-- Logo -->
	<a href="{{ route('dashboard') }}" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>U</b>T</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg">{{ config('app.name') }}</span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-expand-sm navbar-static-top theme-nav">
		<!-- Sidebar toggle button-->
		<a href="#" class="nav-link py-0 sidebar-toggle py-0" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav ml-auto">
				<!-- Messages: style can be found in dropdown.less-->
				<li class="nav-item messages-menu">
					<a href="{{ route('chats.index') }}" class="nav-link py-0">
						<i class="fa fa-envelope-o"></i>
						@auth
						<chat-counter v-bind:user="{{ $user ?? '' }}" v-bind:partner="{{ $partner ?? '{}' }}" v-bind:total_unread_message="{{ $total_unread_message ?? 0 }}"></chat-counter>
						@endauth
					</a>
				</li>
				<!-- Notifications: style can be found in dropdown.less -->
				<li class="nav-item notifications-menu">
					<a href="#" class="nav-link py-0">
						<i class="fa fa-bell-o"></i>
						<span class="badge badge-warning">10</span>
					</a>
				</li>
				<!-- Tasks: style can be found in dropdown.less -->
				<li class="nav-item tasks-menu">
					<a href="#" class="nav-link py-0">
						<i class="fa fa-flag-o"></i>
						<span class="badge badge-danger">9</span>
					</a>
				</li>
				<!-- User Account: style can be found in dropdown.less -->
				<li class="nav-item dropdown user user-menu">
					<a href="#" class="nav-link py-0 dropdown-toggle" data-toggle="dropdown">
						<img src="/assets/profile/{{ $user->photo }}" class="user-image" alt="User Image">
						<span class="hidden-xs">{{ $user->name ?? '' }}</span>
					</a>
					<ul class="dropdown-menu dropdown-menu-right">
						<!-- User image -->
						<li class="user-header">
							<img src="/assets/logo.png" class="img-circle" alt="User Image">
							<p>
								{{ $user->name ?? '' }}
								<small>{{ __('Since') }} {{ $user->created_at->date ?? '' }}</small>
							</p>
						</li>
						<!-- Menu Body -->
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="{{ route('users.show', $user->id ?? '') }}" class="btn btn-default btn-flat">{{ __('Profile') }}</a>
							</div>
							<div class="pull-right">
								<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">{{ __('Logout') }}</a>
							</div>
						</li>
					</ul>
				</li>
				<!-- Control Sidebar Toggle Button -->
				<li class="nav-item ">
					<a href="{{ route('users.edit', $user->id ?? '') }}" data-toggle="nav-link py-0 control-sidebar"><i class="fa fa-gears"></i></a>
				</li>
			</ul>
		</div>
	</nav>
</header>