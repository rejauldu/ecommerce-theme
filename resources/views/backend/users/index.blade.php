@extends('layouts.dashboard')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif
<div class="row">
	<div class="col-12 text-center mt-3">
		<h1>Send email to any user</h1>
	</div>
	<div class="col-12 col-md-1">
	</div>
	<div class="col-12 col-md-10">
		<div class="contact-form">
			<div class="form-group">
				<label class="control-label col-sm-2" for="email">Email:</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="subject">Subject:</label>
				<div class="col-sm-10">          
					<input type="text" class="form-control" id="subject" placeholder="Enter Subject" name="subject">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="message">Message:</label>
				<div class="col-sm-10">
					<textarea class="form-control" rows="5" id="message"></textarea>
				</div>
			</div>
			<div class="form-group">        
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Send</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection