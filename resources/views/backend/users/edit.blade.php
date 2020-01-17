@extends('layouts.dashboard')
@section('title')
Edit Profile
@endsection
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<section class="content-header">
			<h3>Profile <small>Show</small></h3>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="#">Profile</a></li>
				<li class="active">My Profile</li>
			</ol>
		</section>
		@if(session()->has('message'))
		<div class="alert alert-warning">
			{{ session()->get('message') }}
		</div>
		@endif
		<div class="row">
			<div class="col-12">
				<div class="box box-info" style="background:#f8fafc">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-edit"></i> {{ __('Update profile') }}</h3>
						<div class="box-tools float-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="row py-2">
							<div class="col-12 col-md-3"><!--left col-->
								<div class="text-center">
									<img id="display-photo-on-select" src="{{ asset('/assets/profile') }}/{{ $user->photo }}" class="img-thumbnail rounded-circle" alt="avatar">
									<h6>Upload a different photo...</h6>
									<form class="ajax-upload text-left" action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
										@csrf
										@method('PUT')
										<div class="form-group">
											<input type="file" id="file" name="photo" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this)" accept="image/*" value="Upload picture" />
										</div>
										<div class="progress mt-2">
											<div class="progress-bar progress-bar-striped active list" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%; height:100%; line-height:22px"></div>
										</div>
										<input type="submit" class="my-3 btn btn-theme" value="Upload" />
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
												<label for="first_name">Name</label>
												<input id="name" type="text" class="form-control" name="name" value="{{ $user->name ?? '' }}" placeholder="Enter name" title="Enter your name." />
											</div>
											<div class="form-group">
												<label for="phone">Phone</label>
												<input id="phone" type="tel" class="form-control" name="phone" value="{{ $user->phone ?? '' }}" placeholder="Enter phone number" title="Enter your phone number."/>
											</div>
											<div class="form-group">
												<label for="card-type">Card Type</label>
												<select id="card-type" name="payment_id" class="custom-select">
													<option value="-1" selected>--Select Card Type--</option>
													@foreach($payments as $payment)
													<option value="{{ $payment->id }}" @if($payment->id == $user->payment->id) selected @endif>{{ $payment->name }}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group">
												<label for="name-on-card">Name on card</label>
												<input id="name-on-card" type="text" class="form-control" name="name_on_card" value="{{ $user->name_on_card ?? '' }}" placeholder="Enter you name on card" title="Enter your phone number."/>
											</div>
											<div class="form-group">
												<div class="form-group">
													<div class="row">
														<div class="col-6 col-md-3">
															<label for="card-exp-month">Exp. date</label>
															<input id="card-exp-month" type="number" class="form-control" name="card_exp_month" value="{{ $user->card_exp_month ?? '' }}" placeholder="Month" title="Exp. Month"/>
														</div>
														<div class="col-6 col-md-3">
															<label for="card-exp-year">Exp. Year</label>
															<input id="card-exp-year" type="number" class="form-control" name="card_exp_year" value="{{ $user->card_exp_year ?? '' }}" placeholder="Year" title="Exp. Year"/>
														</div>
														<div class="col-12 col-md-6">
															<label for="cvv">CVV</label>
															<input id="cvv" type="number" class="form-control" name="cvv" value="{{ $user->cvv ?? '' }}" placeholder="CVV" title="CVV"/>
														</div>
													</div>
												</div>
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
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection