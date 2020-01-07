@extends('layouts.dashboard')
@section('title')
{{ __(isset($region)?'Update region':'Create region') }}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<section class="content-header">
			<h3>Category <small>{{ isset($region)?'edit':'create' }}</small></h3>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="#">Regions</a></li>
				<li class="active">{{ isset($region)?'Edit':'Create' }}</li>
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
						<h3 class="box-title"><i class="fa fa-edit"></i> {{ __(isset($region)?'Update region':'Create region') }}</h3>
						<div class="box-tools float-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="row pt-2">
							<div class="col-12"><!--left col-->
								<form action="@if(isset($region)) {{ route('regions.update', $region->id) }} @else {{ route('regions.store') }} @endif" method="post" enctype="multipart/form-data">
									@csrf
									@if(isset($region))
										@method('PUT')
									@endif
									<div class="form-group">
										<label for="division_id">Select Division</label>
										<select id="division_id" name="division_id" class="custom-select">
											<option selected>Custom Select Menu</option>
											<option value="volvo">Volvo</option>
											<option value="fiat">Fiat</option>
											<option value="audi">Audi</option>
										</select>
									</div>
									<div class="form-group">
										<label for="district_id">Select District</label>
										<select id="district_id" name="district_id" class="custom-select">
											<option selected>Custom Select Menu</option>
											<option value="volvo">Volvo</option>
											<option value="fiat">Fiat</option>
											<option value="audi">Audi</option>
										</select>
									</div>
									<div class="form-group">
										<label for="name">Name</label>
										<input id="name" type="text" class="form-control" name="name" value="{{ $region->name ?? '' }}" placeholder="First name" title="Enter your first name if any." />
									</div>
									<div class="form-group mt-3">
										<button class="btn btn-success btn-theme" type="submit">{{ __(isset($region)?'Update':'Save') }}</button>
									</div>
								</form>
							</div><!--/col-9-->
						</div><!--/row-->
					</div>
				</div>
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
      $('.editor-tools').summernote({
        placeholder: 'Enter email body',
        tabsize: 2,
        height: 100
      });
    </script>
	<script>
		var divisions = @json($divisions);
		var districts = @json($districts);
		@if(isset($region))
		var selected_division = {{ $region->division_id }};
		var selected_district = {{ $region->district_id }};
		@endif
	</script>
	<script src="{{ asset('js/location.js') }}?{{ time() }}"></script>
@endsection