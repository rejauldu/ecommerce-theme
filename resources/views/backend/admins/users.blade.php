@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		@if(session()->has('message'))
		<div class="alert alert-warning">
			{{ session()->get('message') }}
		</div>
		@endif
		<div class="row">
			<div class="col-12 text-center mt-3">
				<h1>{{ __('All Users & Morderators') }}</h1>
			</div>
			<table class="table table-striped table-sm">
				<thead class="thead-light">
					<tr>
						<th><input type="checkbox" /></th>
						<th>{{ __('Firstname') }}</th>
						<th>{{ __('Lastname') }}</th>
						<th>{{ __('Email') }}</th>
						<th>{{ __('Role') }}</th>
						<th>{{ __('Edit') }}</th>
						<th>{{ __('Delete') }}</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input type="checkbox" name="id[]" value=""/></td>
						<td>John</td>
						<td>Doe</td>
						<td>john@example.com</td>
						<td>User</td>
						<td><i class="fa fa-edit text-success"></i></td>
						<td><i class="fa fa-trash text-danger"></i></td></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="id[]" value=""/></td>
						<td>Mary</td>
						<td>Moe</td>
						<td>mary@example.com</td>
						<td>User</td>
						<td><i class="fa fa-edit text-success"></i></td>
						<td><i class="fa fa-trash text-danger"></i></td></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="id[]" value=""/></td>
						<td>July</td>
						<td>Dooley</td>
						<td>july@example.com</td>
						<td>User</td>
						<td><i class="fa fa-edit text-success"></i></td>
						<td><i class="fa fa-trash text-danger"></i></td></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="id[]" value=""/></td>
						<td>July</td>
						<td>Dooley</td>
						<td>july@example.com</td>
						<td>User</td>
						<td><i class="fa fa-edit text-success"></i></td>
						<td><i class="fa fa-trash text-danger"></i></td></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="id[]" value=""/></td>
						<td>July</td>
						<td>Dooley</td>
						<td>july@example.com</td>
						<td>User</td>
						<td><i class="fa fa-edit text-success"></i></td>
						<td><i class="fa fa-trash text-danger"></i></td></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="id[]" value=""/></td>
						<td>July</td>
						<td>Dooley</td>
						<td>july@example.com</td>
						<td>User</td>
						<td><i class="fa fa-edit text-success"></i></td>
						<td><i class="fa fa-trash text-danger"></i></td></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection