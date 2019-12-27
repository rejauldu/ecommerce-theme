@extends('layouts.dashboard')

@section('content')
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
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-user"></i> {{ __('Profile details') }}</h3>
				<div class="box-tools float-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<ul class="nav nav-tabs fancy-tab" role="tablist">
                    <li class="nav-item active">
						<div class="arrow-down"><div class="arrow-down-inner"></div></div>	
						<a class="nav-link" href="#tab1" data-toggle="tab"><span class="fa fa-desktop"></span><span class="hidden-xs">Connect</span></a>
                    </li>
                    
                    <li class="nav-item">
						<div class="arrow-down"><div class="arrow-down-inner"></div></div>
                        <a class="nav-link" href="#tab2" data-toggle="tab"><span class="fa fa-firefox"></span><span class="hidden-xs">Create</span></a>
                    </li>
                    
                    <li class="nav-item">
						<div class="arrow-down"><div class="arrow-down-inner"></div></div>
                        <a class="nav-link" href="#tab3" data-toggle="tab"><span class="fa fa-envira"></span><span class="hidden-xs">Discover</span></a>
                    </li>
                    
                    <li class="nav-item">
                    <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                        <a class="nav-link" href="#tab4" data-toggle="tab"><span class="fa fa-mortar-board"></span><span class="hidden-xs">Align</span></a>
                    </li> 
                         
                    <li class="nav-item">
                    <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                        <a class="nav-link" href="#tab5" data-toggle="tab"><span class="fa fa-stack-overflow"></span><span class="hidden-xs">Capture</span></a>
                    </li>
                    
                    <li class="nav-item">
                    <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                        <a class="nav-link" href="#tab6" data-toggle="tab"><span class="fa fa-question-circle"></span><span class="hidden-xs">Order</span></a>
                    </li>
				</ul>
				<div class="tab-content fancy-tab-content">
                    <div id="tab1" class="container tab-pane active"><br>
						<h3>Connect</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<div id="tab2" class="container tab-pane fade"><br>
						<h3>Create</h3>
						<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					<div id="tab3" class="container tab-pane fade"><br>
						<h3>Discover</h3>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
					</div>
					<div id="tab4" class="container tab-pane fade"><br>
						<h3>Align</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<div id="tab5" class="container tab-pane fade"><br>
						<h3>Capture</h3>
						<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					<div id="tab6" class="container tab-pane fade"><br>
						<h3>Order</h3>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('style')
    <style>
	</style>
@endsection
@section('script')
    <script>
		
    </script>
@endsection