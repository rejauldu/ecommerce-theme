<div class="row bg-dark-theme expand-on-md vp-h-55-md sticky-top sticky-offset-55" id="left-sidebar">
	<div class="col-12 navbar-dark" data-toggle="collapse" data-target="#left-sidebar-navbar">
		<button class="navbar-toggler" type="button">
			<span class="navbar-toggler-icon text-white"></span>
		</button>
	</div>
	<div class="col-12 px-0">
		<nav id="left-sidebar-navbar" class="navbar px-0 collapse navbar-collapse">
			<ul class="navbar-nav">
				<li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
					<a class="nav-link" href="{{ route('dashboard') }}"><i class="fa fa-dashboard mr-1"></i><span class="hover-move">{{ __('Dashboard') }}</span><i class="fa collapse-icon"></i></a>
				</li>
				<li class="nav-item {{ Request::is('users*') ? 'active' : '' }}" data-toggle="collapse" href="#left-sidebar-profile">
					<a class="nav-link" href="#"><i class="fa fa-user mr-1"></i><span class="hover-move">{{ __('Profile') }}</span><i class="fa collapse-icon"></i></a>
					<ul id="left-sidebar-profile" class="list-group list-group-flush list-group-transparent collapse {{ Request::is('users*') ? 'show' : '' }}" data-parent="#left-sidebar-navbar">
						<li class="list-group-item {{ Request::route()->getName() == 'users.show' ? 'active' : '' }}"><a class="hover-move" href="{{ route('users.show', Auth::user()->id) }}"><i class="fa fa-adjust"></i> {{ __('My Profile') }}</a></li>
						<li class="list-group-item {{ Request::route()->getName() == 'users.edit' ? 'active' : '' }}"><a class="hover-move" href="{{ route('users.edit', Auth::user()->id) }}"><i class="fa fa-adjust"></i> {{ __('Settings') }}</a></li>
						<li class="list-group-item {{ Request::is('users/activity') ? 'active' : '' }}"><a class="hover-move" href="#"><i class="fa fa-adjust"></i> {{ __('Activity Log') }}</a></li>
						<li class="list-group-item {{ Request::is('users/logout') ? 'active' : '' }}"><a class="hover-move" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-adjust"></i> {{ __('Logout') }}</a></li>
					</ul>
				</li>
				<li class="nav-item {{ Request::is('chat') ? 'active' : '' }}">
					<a class="nav-link" href="{{ route('chats.chat') }}"><i class="fa fa-envelope mr-1"></i><span class="hover-move">{{ __('Chat') }}</span><i class="fa collapse-icon"></i></a>
				</li>
				@admin
				<li class="nav-item {{ Request::is('user-managements') ? 'active' : '' }}">
					<a class="nav-link" href="{{ route('user-managements.index') }}"><i class="fa fa-users mr-1"></i><span class="hover-move">{{ __('User Management') }}</span><i class="fa collapse-icon"></i></a>
				</li>
				<li class="nav-item {{ Request::is('notifications*') ? 'active' : '' }}" data-toggle="collapse" href="#lm-email">
					<a class="nav-link" href="#"><i class="fa fa-bell mr-1"></i><span class="hover-move">{{ __('Notification') }}</span><i class="fa collapse-icon"></i></a>
					<ul id="lm-email" class="list-group list-group-flush list-group-transparent collapse {{ Request::is('notifications*') ? 'show' : '' }}" data-parent="#left-sidebar-navbar">
						<li class="list-group-item {{ Request::is('notifications') ? 'active' : '' }}"><a class="hover-move" href="{{ route('notifications.index') }}"><i class="fa fa-adjust"></i> {{ __('Notifications') }}</a></li>
						<li class="list-group-item {{ Request::is('notifications/create') ? 'active' : '' }}"><a class="hover-move" href="{{ route('notifications.create') }}"><i class="fa fa-adjust"></i> {{ __('Send email') }}</a></li>
					</ul>
				</li>
				@endadmin
			</ul>
		</nav>
	</div>
</div>