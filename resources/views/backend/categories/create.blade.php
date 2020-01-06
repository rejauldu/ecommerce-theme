@extends('layouts.dashboard')
@section('title')
{{ __(isset($category)?'Update category':'Create category') }}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<section class="content-header">
			<h3>Category <small>{{ isset($category)?'edit':'create' }}</small></h3>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="#">Categories</a></li>
				<li class="active">{{ isset($category)?'Edit':'Create' }}</li>
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
						<h3 class="box-title"><i class="fa fa-edit"></i> {{ __(isset($category)?'Update category':'Create category') }}</h3>
						<div class="box-tools float-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="row pt-2">
							<div class="col-12"><!--left col-->
								<form action="@if(isset($category)) {{ route('categories.update', $category->id) }} @else {{ route('categories.create') }} @endif" method="post" enctype="multipart/form-data">
									@csrf
									@method('PUT')
									<div class="form-group">
										<label for="name">Name</label>
										<input id="name" type="text" class="form-control" name="name" value="{{ $category->name ?? '' }}" placeholder="First name" title="Enter your first name if any." />
									</div>
									<div class="form-group">
										<label for="picture">Picture</label>
										<input id="picture" type="file" class="form-control" name="picture" />
									</div>
									<div class="form-group">
										<label for="description">Description</label>
										<textarea id="description" class="form-control editor-tools" name="description" placeholder="Description" title="Enter description">{{ $category->description ?? '' }}</textarea>
									</div>
									
									<div class="form-group">
										<button class="btn btn-success btn-theme" type="submit">{{ __(isset($category)?'Update':'Save') }}</button>
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
@endsection