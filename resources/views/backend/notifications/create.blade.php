@extends('layouts.dashboard')

@section('content')
<section class="content-header">
	<h3>Notification <small>Send</small></h3>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active">Send Email</li>
	</ol>
</section>
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif
<div class="row">
	<div class="col-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-envelope mr-1"></i> {{ __('Send Email') }}</h3>
				<div class="box-tools float-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<form class="needs-validation" action="{{ route('notifications.store') }}" method="post">
					@csrf
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Enter email ID" id="email" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label for="subject">Subject:</label>
						<input type="text" name="subject" class="form-control" placeholder="Subject of email" id="subject" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<!-- toolbar with suitable buttons and dialogues -->
					<div class="form-group">
						<label for="message">Message:</label>
						<textarea id="summernote" name="body" class="form-control" rows="5" id="message" required></textarea>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<button type="submit" class="btn btn-theme">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
    <script>
      $('#summernote').summernote({
        placeholder: 'Enter email body',
        tabsize: 2,
        height: 100
      });
    </script>
@endsection