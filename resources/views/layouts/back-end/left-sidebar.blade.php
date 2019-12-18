<div class="row bg-dark" id="left-sidebar">
	<div class="col-12 d-md-none">
		<button type="button" class="btn btn-theme shadow-sm px-4 my-2" data-toggle="collapse" data-target="#navbar">
			<i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small>
		</button>
	</div>
	<div class="col-12">
		<nav id="navbar" class="collapse show navbar bg-dark navbar-dark px-0">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="fa fa-adjust mr-1"></i><span class="hover-move">Dashboard</span><i class="fa collapse-icon"></i></a>
				</li>
				<li class="nav-item" data-toggle="collapse" href="#collapseThree">
					<a class="nav-link {{ Request::is('link-3') ? 'active' : '' }}" href="#"><i class="fa fa-adjust mr-1"></i><span class="hover-move">Link 3</span><i class="fa collapse-icon"></i></a>
					<ul id="collapseThree" class="list-group list-group-flush list-group-dark collapse {{ Request::is('link-3') ? 'show' : '' }}" data-parent="#navbar">
						<li class="list-group-item"><a class="hover-move" href="#">Sub1</a></li>
						<li class="list-group-item"><a class="hover-move" href="#">Sub2</a></li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ Request::is('chat') ? 'active' : '' }}" href="{{ route('chat') }}"><i class="fa fa-adjust mr-1"></i><span class="hover-move">{{ __('Chat') }}</span><i class="fa collapse-icon"></i></a>
				</li>
				@admin
				<li class="nav-item">
					<a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="{{ route('users') }}"><i class="fa fa-adjust mr-1"></i><span class="hover-move">{{ __('Users') }}</span><i class="fa collapse-icon"></i></a>
				</li>
				<li class="nav-item" data-toggle="collapse" href="#lm-email">
					<a class="nav-link {{ Request::is('emails*') ? 'active' : '' }}" href="#"><i class="fa fa-adjust mr-1"></i><span class="hover-move">Email</span><i class="fa collapse-icon"></i></a>
					<ul id="lm-email" class="list-group list-group-flush list-group-dark collapse {{ Request::is('emails*') ? 'show' : '' }}" data-parent="#navbar">
						<li class="list-group-item {{ Request::is('emails') ? 'active' : '' }}"><a class="hover-move" href="{{ route('emails.index') }}">Emails</a></li>
						<li class="list-group-item {{ Request::is('emails/create') ? 'active' : '' }}"><a class="hover-move" href="{{ route('emails.create') }}">Send email</a></li>
					</ul>
				</li>
				@endadmin
			</ul>
		</nav>
	</div>
</div>