<div class="row">
	<!--The following div is just to take the space of fixed top bar-->
	<div class="d-none d-md-flex col-md-12 navbar">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="{{ URL::to('/') }}">{{ URL::to('/') }}</a>
			</li>
		</ul>
	</div>
	<div class="d-none d-md-flex col-md-12 navbar navbar-theme fixed-top">
		<div class="row">
			<div class="col-md-3 col-lg-2">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link text-white" href="{{ URL::to('/') }}">{{ URL::to('/') }}</a>
					</li>
				</ul>
			</div>
			<div class="col-md-9 col-lg-10">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link text-white" href="#">Link top</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>