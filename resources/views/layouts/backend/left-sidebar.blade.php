<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image" style="height:35px">
				<img src="/assets/profile/{{ $user->photo }}" class="rounded-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>{{ $user->name ?? '' }}</p>
				<a href="#"><i class="fa fa-circle text-success"></i> {{ __('Online') }}</a>
			</div>
		</div>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>
		<!-- /.search form -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header"></li>
			<li class="{{ Request::is('dashboard') ? 'active' : '' }}">
				<a href="{{ route('dashboard') }}">
					<i class="fa fa-dashboard"></i><span>{{ __('Dashboard') }}</span>
				</a>
			</li>
			<li class="treeview {{ Request::is('users*') ? 'active' : '' }}">
				<a href="#">
					<i class="fa fa-user"></i><span>{{ __('Profile') }}</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu {{ Request::is('users*') ? 'show' : '' }}">
					<li class="{{ Request::route()->getName() == 'users.show' ? 'active' : '' }}"><a href="{{ route('users.show', $user->id) }}"><i class="fa fa-circle-o"></i> {{ __('My Profile') }}</a></li>
					<li class="{{ Request::route()->getName() == 'users.edit' ? 'active' : '' }}"><a href="{{ route('users.edit', $user->id) }}"><i class="fa fa-circle-o"></i> {{ __('Settings') }}</a></li>
					<li class=""><a href="#"><i class="fa fa-circle-o"></i> {{ __('Activity Log') }}</a></li>
					<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-circle-o"></i> {{ __('Logout') }}</a></li>
				</ul>
			</li>
			<li class="{{ Request::is('chat') ? 'active' : '' }}">
				<a href="{{ route('chats.chat') }}"><i class="fa fa-envelope"></i><span>{{ __('Chat') }}</span></a>
			</li>
			@admin
			<li class="{{ Request::is('user-managements') ? 'active' : '' }}">
				<a href="{{ route('user-managements.index') }}">
					<i class="fa fa-users"></i><span>{{ __('User Management') }}</span>
				</a>
			</li>
			<li class="treeview {{ Request::is('suppliers*') ? 'active' : '' }}">
				<a href="#">
					<i class="fa fa-industry" aria-hidden="true"></i> <span> {{ __('Supplier Management') }}</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li class="{{ Request::is('suppliers') ? 'active' : '' }}"><a href="{{ route('suppliers.index') }}"><i class="fa fa-circle-o"></i> Manage Supplier</a></li>
					<li class="{{ Request::is('suppliers/create') ? 'active' : '' }}"><a href="{{ route('suppliers.create') }}"><i class="fa fa-circle-o"></i> Add New Supplier</a></li>
				</ul>
			</li>
			<li class="treeview {{ Request::is('notifications*') ? 'active' : '' }}" data-toggle="collapse" href="#lm-email">
				<a href="#">
					<i class="fa fa-bell"></i><span>{{ __('Notification') }}</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu {{ Request::is('notifications*') ? 'show' : '' }}">
					<li class="{{ Request::is('notifications') ? 'active' : '' }}"><a href="{{ route('notifications.index') }}"><i class="fa fa-circle-o"></i> {{ __('Notifications') }}</a></li>
					<li class="{{ Request::is('notifications/create') ? 'active' : '' }}"><a href="{{ route('notifications.create') }}"><i class="fa fa-circle-o"></i> {{ __('Send email') }}</a></li>
				</ul>
			</li>
			<li class="treeview {{ Request::is('categories*') ? 'active' : '' }}">
				<a href="#">
					<i class="fa fa-list" aria-hidden="true"></i> <span>Category</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li class="{{ Request::is('categories') ? 'active' : '' }}"><a href="{{ route('categories.index') }}"><i class="fa fa-circle-o"></i> Manage Category</a></li>
					<li class="{{ Request::is('categories/create') ? 'active' : '' }}"><a href="{{ route('categories.create') }}"><i class="fa fa-circle-o"></i> Add New Category</a></li>
				</ul>
			</li>
			<li class="treeview {{ Request::is('payments*') ? 'active' : '' }}">
				<a href="#">
					<i class="fa fa-credit-card" aria-hidden="true"></i> <span>Payment</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li class="{{ Request::is('payments') ? 'active' : '' }}"><a href="{{ route('payments.index') }}"><i class="fa fa-circle-o"></i> Manage Payment</a></li>
					<li class="{{ Request::is('payments/create') ? 'active' : '' }}"><a href="{{ route('payments.create') }}"><i class="fa fa-circle-o"></i> Add New Payment</a></li>
				</ul>
			</li>
			<li class="treeview {{ Request::is('regions*') ? 'active' : '' }}">
				<a href="#">
					<i class="fa fa-address-card" aria-hidden="true"></i> <span>Locations</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li class="{{ Request::is('regions') ? 'active' : '' }}"><a href="{{ route('regions.index') }}"><i class="fa fa-circle-o"></i> Manage Region</a></li>
					<li class="{{ Request::is('regions/create') ? 'active' : '' }}"><a href="{{ route('regions.create') }}"><i class="fa fa-circle-o"></i> Add New Region</a></li>
				</ul>
			</li>
			@endadmin
			
			<li class="treeview">
				<a href="#">
					<i class="fa fa-arrows-alt" aria-hidden="true"></i> <span>Manage Size</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href=""><i class="fa fa-circle-o"></i> Add New Product Size</a></li>
					<li><a href=""><i class="fa fa-circle-o"></i> Browse Product Sizes</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-product-hunt" aria-hidden="true"></i>
					<span>Product</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{url('add-product')}}"><i class="fa fa-circle-o"></i> Add Product</a></li>
					<li><a href="{{url('/product-manage')}}"><i class="fa fa-circle-o"></i> View All Product</a></li>
					<li class="treeview">
						<a href="#"><i class="fa fa-circle-o"></i> Manage Check This Out
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href=""><i class="fa fa-circle-o"></i> Add Product To List</a></li>
							<li><a href=""><i class="fa fa-circle-o"></i> Switch To Auto/Manual Mode</a></li>
						</ul>
					</li>
					<li><a href="{{url('/update-quantity-search')}}"><i class="fa fa-circle-o"></i> Update Quntity</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					<span>Manage Order</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
						<small><span class="badge badge-warning">10</span></small>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{url('/utadmin/manage-incomplete-order')}}"><i class="fa fa-circle-o"></i> Incomplete Order 	
							<span class="pull-right-container">
								<small class="label pull-right bg-blue">0</small>
							</span></a></li>
					<li><a href="{{url('/utadmin/manage-all-order')}}"><i class="fa fa-circle-o"></i> All Order</a></li>
				</ul>
			</li>
			<li>
				<a href="">
					<i class="fa fa-users" aria-hidden="true"></i> <span>User Manage</span>
				</a>
			</li>
			<li>
				<a href="">
					<i class="fa fa-phone" aria-hidden="true"></i> <span>Phone Request</span>
				</a>
			</li>
			<li class="header"></li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>