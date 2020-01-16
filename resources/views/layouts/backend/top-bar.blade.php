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
							<p>{{ $user->name ?? '' }} <small>{{ __('Since') }} {{ $user->created_at->date ?? '' }}</small></p>
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
					<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
				</li>
			</ul>
		</div>
	</nav>
</header>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Create the tabs -->
	<ul class="nav nav-tabs nav-justified control-sidebar-tabs nav-theme">
		  <li><a class="nav-link" href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
		  <li><a class="nav-link" href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
	</ul>
<!-- Tab panes -->
	<div class="tab-content">
		<!-- Home tab content -->
		<div class="tab-pane" id="control-sidebar-home-tab">
			<h3 class="control-sidebar-heading">Recent Activity</h3>
			<ul class="control-sidebar-menu">
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-birthday-cake bg-red"></i>
						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
							<p>Will be 23 on April 24th</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-user bg-yellow"></i>
						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
							<p>New phone +1(800)555-1234</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
							<p>nora@example.com</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-file-code-o bg-green"></i>
						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
							<p>Execution time 5 seconds</p>
						</div>
					</a>
				</li>
			</ul>
			<!-- /.control-sidebar-menu -->
			<h3 class="control-sidebar-heading">Tasks Progress</h3>
			<ul class="control-sidebar-menu">
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Custom Template Design
							<span class="label label-danger pull-right">70%</span>
						</h4>
						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Update Resume
							<span class="label label-success pull-right">95%</span>
						</h4>
						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-success" style="width: 95%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Laravel Integration
							<span class="label label-warning pull-right">50%</span>
						</h4>

						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-warning" style="width: 50%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Back End Framework
							<span class="label label-primary pull-right">68%</span>
						</h4>

						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-primary" style="width: 68%"></div>
						</div>
					</a>
				</li>
			</ul>
			<!-- /.control-sidebar-menu -->
		</div>
		<!-- /.tab-pane -->
		<!-- Stats tab content -->
		<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
		<!-- /.tab-pane -->
		<!-- Settings tab content -->
		<div class="tab-pane" id="control-sidebar-settings-tab">
			<form method="post">
				<h3 class="control-sidebar-heading">General Settings</h3>
				<div class="form-group">
					<label class="control-sidebar-subheading">Report panel usage <input type="checkbox" class="pull-right" checked></label>
					<p>Some information about this general settings option</p>
				</div>
				<!-- /.form-group -->
				<div class="form-group">
					<label class="control-sidebar-subheading">Allow mail redirect<input type="checkbox" class="pull-right" checked></label>
					<p>Other sets of options are available</p>
				</div>
				<!-- /.form-group -->
				<div class="form-group">
					<label class="control-sidebar-subheading">Expose author name in posts<input type="checkbox" class="pull-right" checked></label>
					<p>Allow the user to show his name in blog posts</p>
				</div>
				<!-- /.form-group -->
				<h3 class="control-sidebar-heading">Chat Settings</h3>
				<div class="form-group">
					<label class="control-sidebar-subheading">Show me as online<input type="checkbox" class="pull-right" checked></label>
				</div>
				<!-- /.form-group -->
				<div class="form-group">
					<label class="control-sidebar-subheading">Turn off notifications<input type="checkbox" class="pull-right"></label>
				</div>
				<!-- /.form-group -->
				<div class="form-group">
					<label class="control-sidebar-subheading">Delete chat history<a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a></label>
				</div>
				<!-- /.form-group -->
			</form>
		</div>
		<!-- /.tab-pane -->
	</div>
</aside>
<!-- /.control-sidebar -->