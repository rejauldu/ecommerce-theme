@extends('layouts.dashboard')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif
<div class="container">
	<div class="row pt-2">
		<div class="col-12 col-md-3"><!--left col-->
			<div class="text-center">
				<img id="display-photo-on-select" src="{{ asset('/assets/profile') }}/{{ $user->photo }}" class="img-thumbnail rounded-circle" alt="avatar">
				<h6>Upload a different photo...</h6>
				<form class="ajax-upload text-left" action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<input type="file" id="file" name="photo" class="btn-theme" onchange="displayPhotoOnSelect(this)" accept="image/*" value="Upload picture" />
					<div class="progress mt-2">
						<div class="progress-bar progress-bar-striped active list" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%; height:100%; line-height:22px"></div>
					</div>
					<input type="submit" class="mt-3 btn btn-theme" value="Upload" />
				</form>
			</div>
		</div><!--/col-3-->
    	<div class="col-12 col-md-9">
			<ul class="nav nav-tabs">
				<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile">Profile</a></li>
				<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#password">Password</a></li>
				<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#address1">Address 1</a></li>
				<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#address2">Address 2</a></li>
				
			</ul>
			<div class="tab-content mt-3">
				<div class="tab-pane active" id="profile">
					<form class="ajax-upload" action="{{ route('users.update', $user->id) }}" method="post">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="first_name"><h4>Name</h4></label>
							<input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="First name" title="Enter your first name if any." />
						</div>
						<div class="form-group">
							<label for="email"><h4>Email</h4></label>
							<input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="you@email.com" title="Enter your email."/>
						</div>
						
						<div class="form-group">
							<button id="profile-submit" class="btn btn-theme" type="submit">Update</button>
						</div>
					</form>
				</div><!--/tab-pane-->
				<div class="tab-pane" id="password">
					<form class="ajax-upload" action="{{ route('users.update', $user->id) }}" method="post">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="password_old"><h4>Old Password</h4></label>
							<input id="password_old" type="password" class="form-control" name="password_old" value="" placeholder="Enter old password" title="Enter old password."/>
						</div>
						<div class="form-group">
							<label for="password"><h4>New Password</h4></label>
							<input id="password" type="password" class="form-control" name="password" value="" placeholder="Enter new password." title="Enter your password."/>
						</div>
						<div class="form-group">
							<label for="password_confirmation"><h4>Confirm Password</h4></label>
							<input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="" placeholder="Enter new password again." title="Enter your password again.">
						</div>
						<div class="form-group">
							<button  id="password_submit" class="btn btn-theme" type="submit">Update</button>
						</div>
					</form>
				</div><!--/tab-pane-->
				<div class="tab-pane" id="address1">
					<form class="ajax-upload" action="{{ route('users.update', $user->id) }}" method="post">
						@csrf
						@method('PUT')
						<div class="form-group">
							<div class="col-xs-6">
								<label for="first_name"><h4>First name2</h4></label>
								<input type="text" class="form-control" name="first_name" placeholder="first name" title="enter your first name if any."/>
							</div>
						</div>
						<div class="form-group">
							<button id="address1_submit" class="btn btn-theme" type="submit">Update</button>
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
						<div class="form-group">
							<button id="address2_submit" class="btn btn-theme" type="submit">Update</button>
						</div>
					</form>
				</div><!--/tab-pane-->
				
			</div><!--/tab-content-->
		</div><!--/col-9-->
	</div><!--/row-->
@endsection