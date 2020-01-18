@extends('layouts.dashboard')
@section('title')
{{ __('All Users') }}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<section class="content-header">
			<h3>User <small>all</small></h3>
			<ol class="breadcrumb">
				<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">Users</li>
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
						<h3 class="box-title"><i class="fa fa-credit-card mr-1"></i> {{ __('All Users') }}</h3>
						<div class="box-tools float-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<table id="dataTables" class="display nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Photo</th>
									<th>Phone</th>
									<th>District</th>
									<th>Role</th>
									<th>Joined At</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								@foreach($users as $single)
								<tr>
									<td>{{ $single->id }}</td>
									<td>{{ $single->name }}</td>
									<td><img onerror="this.onerror=null; this.src='{{ asset("/assets/profile/avatar.png") }}'" src="{{ asset("/assets/profile/") }}/{{ $single->photo }}" alt="User photo" width="50" height="50"  class="img-thumbnail" /></td>
									<td>{{ $single->phone }}</td>
									<td>{{ $single->district->name }}</td>
									<td>{{ $single->role->name }}</td>
									<td>{{ $single->created_at->format('jS M Y') }}</td>
									<td><a href="{{ route('users.edit', $single->id) }}" class="text-success fa fa-edit"></a></td>
									<td><a href="{{ route('users.destroy', $single->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form').action = this.href; document.getElementById('delete-form').submit.click();" class="text-danger fa fa-trash"></button></td>
								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Photo</th>
									<th>Phone</th>
									<th>District</th>
									<th>Role</th>
									<th>Joined At</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</tfoot>
						</table>
						<div class="d-flex my-5">
							<div class="mx-auto">
								{{ $users->links() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('style')
	<!-- dataTables plugin -->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" media="all"/>
	<link href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css" rel="stylesheet" media="screen">
	<link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet" media="all"/>
	<!-- /dataTables plugin -->
@endsection
@section('script')
	<!---dataTables plugin JavaScript -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script src="{{ asset('js/dataTables.js') }}"></script>
	<!--/dataTables plugin JavaScript -->
@endsection