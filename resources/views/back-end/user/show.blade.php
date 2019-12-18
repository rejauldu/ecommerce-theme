@extends('layouts.dashboard')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif
<div class="container">
	<div class="row pt-2">
		<div class="col-6"><h1>{{ Auth::user()->name }}</h1></div>
		<div class="col-6"><a href="/users" class="pull-right"><img width="80" height="80" title="profile image" class="img-circle img-responsive" src="{{ asset('assets/profile') }}/{{ Auth::user()->photo }}"></a></div>
	</div>
	<div class="row">
		<div class="col-12 col-md-3"><!--left col-->
			<div class="text-center">
				<img src="{{ asset('/assets/profile/avatar.png') }}" class="img-thumbnail rounded-circle" alt="avatar">
				<h6>Upload a different photo...</h6>
				<input type="file" class="text-center btn-theme" />
			</div>
			<ul class="list-group mt-3">
				<li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">Social Media</div>
				<div class="panel-body">
					<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
				</div>
			</div>
		</div><!--/col-3-->
    	<div class="col-12 col-md-9">
			<ul class="nav nav-tabs">
				<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile">Profile</a></li>
				<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#mobile">Mobile</a></li>
				<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#address1">Address 1</a></li>
				<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#address2">Address 2</a></li>
				
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="profile">
					<form class="form" action="#" method="post">
						<div class="form-group">
							<label for="first_name"><h4>Name</h4></label>
							<input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" placeholder="First name" title="Enter your first name if any." />
						</div>
						<div class="form-group">
							<label for="mobile"><h4>Mobile</h4></label>
							<input type="text" class="form-control" name="mobile" value="{{ Auth::user()->mobile }}" placeholder="Enter mobile number" title="Enter your mobile number if any."/>
						</div>
						<div class="form-group">
							<label for="email"><h4>Email</h4></label>
							<input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="you@email.com" title="Enter your email."/>
						</div>
						<div class="form-group">
							<label for="password"><h4>New Password</h4></label>
							<input type="password" class="form-control" name="password" value="{{ Auth::user()->password }}" placeholder="password" title="Enter your password."/>
						</div>
						<div class="form-group">
							<label for="password2"><h4>Verify Password</h4></label>
							<input type="password" class="form-control" name="password2" value="" placeholder="Match password" title="Enter your password again.">
						</div>
						<div class="form-group">
							<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
						</div>
					</form>
				</div><!--/tab-pane-->
				<div class="tab-pane" id="mobile">
					<form class="form" action="##" method="post">
						<div class="form-group">
							<div class="col-xs-6">
								<label for="first_name"><h4>First name3</h4></label>
								<input type="text" class="form-control" name="first_name" placeholder="first name" title="enter your first name if any."/>
							</div>
						</div>
					</form>
				</div><!--/tab-pane-->
				<div class="tab-pane" id="address1">
					<form class="form" action="##" method="post">
						<div class="form-group">
							<div class="col-xs-6">
								<label for="first_name"><h4>First name2</h4></label>
								<input type="text" class="form-control" name="first_name" placeholder="first name" title="enter your first name if any."/>
							</div>
						</div>
					</form>
				</div><!--/tab-pane-->
				<div class="tab-pane" id="address2">
					<form class="form" action="##" method="post">
						<div class="form-group">
							<div class="col-xs-6">
								<label for="first_name"><h4>First name3</h4></label>
								<input type="text" class="form-control" name="first_name" placeholder="first name" title="enter your first name if any."/>
							</div>
						</div>
					</form>
				</div><!--/tab-pane-->
				
			</div><!--/tab-content-->
		</div><!--/col-9-->
	</div><!--/row-->
@endsection
@section('script')

@endsection