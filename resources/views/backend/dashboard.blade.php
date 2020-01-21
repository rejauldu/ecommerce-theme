@extends('layouts.dashboard')
@section('title')
{{ __('Dashboard') }}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<section class="content-header">
			<h3>Dashboard</h3>
			<ol class="breadcrumb">
				<li class="active">Dashboard</li>
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
						<h3 class="box-title"><i class="fa fa-credit-card mr-1"></i> {{ __('Dashboard') }}</h3>
						<div class="box-tools float-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-md-3 col-sm-6 col-12">
								<div class="small-box bg-aqua">
									<div class="inner">
										<h3>123</h3>
										<h4>Incomplete Orders</h4>
									</div>
									<div class="icon">
										<i class="ion ion-bag"></i>
									</div>
									<a href="" class="small-box-footer">Go to incomplete orders page<i class="fa fa-arrow-circle-right"></i></a>
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-md-3 col-sm-6 col-12">
								<div class="small-box bg-green">
									<div class="inner">
										<h3>123</h3>
										<h4>Total Orders</h4>
									</div>
									<div class="icon">
										<i class="ion ion-stats-bars"></i>
									</div>
									<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-md-3 col-sm-6 col-12">
								<div class="small-box bg-green">
									<div class="inner">
										<h3>123</h3>
										<h4>User Registrations</h4>
									</div>
									<div class="icon">
										<i class="ion ion-person-add"></i>
									</div>
									<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-md-3 col-sm-6 col-12">
								<div class="small-box bg-aqua">
									<div class="inner">
										<h3>123</h3>
										<h4>Number of Listings</h4>
									</div>
									<div class="icon">
										<i class="ion ion-pie-graph"></i>
									</div>
									<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-md-3 col-sm-6 col-12">
								<div class="small-box bg-green">
									<div class="inner">
										<h3>123</h3>
										<h4>Complete Orders</h4>
									</div>
									<div class="icon">
										<i class="ion ion-bag"></i>
									</div>
									<a href="" class="small-box-footer">Go to incomplete orders page<i class="fa fa-arrow-circle-right"></i></a>
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-md-3 col-sm-6 col-12">
								<div class="small-box small-box bg-red">
									<div class="inner">
										<h3>123
											<sup style="font-size: 20px">%</sup>
										</h3>
										<h4>Bounce Rate</h4>
									</div>
									<div class="icon">
										<i class="ion ion-stats-bars"></i>
									</div>
									<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-md-3 col-sm-6 col-12">
								<div class="small-box bg-red">
									<div class="inner">
										<h3>123</h3>
										<h4>Total Bounce Orders</h4>
									</div>
									<div class="icon">
										<i class="ion ion-person-add"></i>
									</div>
									<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-md-3 col-sm-6 col-12">
								<div class="small-box bg-aqua">
									<div class="inner">
										<h3>123</h3>
										<h4>Total Quantity</h4>
									</div>
									<div class="icon">
										<i class="ion ion-pie-graph"></i>
									</div>
									<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
								</div>
								<!-- /.info-box -->
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
			<div class="col-12 col-md-6">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Traffic Comparison</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body chart">
						<div class="chart-responsive">
							<canvas id="lineChart"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Computer vs Mobile</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body chart">
						<div class="chart-responsive">
							<canvas id="areaChart"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Monthly Sales Report</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse">
								<i class="fa fa-minus"></i>
							</button>
							<div class="btn-group">
								<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<i class="fa fa-wrench"></i>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="#">Action</a>
									</li>
									<li>
										<a href="#">Another action</a>
									</li>
									<li>
										<a href="#">Something else here</a>
									</li>
									<li>
										<a href="#">Separated link</a>
									</li>
								</ul>
							</div>
							<button type="button" class="btn btn-box-tool" data-widget="remove">
								<i class="fa fa-times"></i>
							</button>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-md-8">
								<p class="text-center">
									<strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
								</p>

								<div class="chart">
									<canvas id="barChart" style="height: 124px; width: 486px;" height="124" width="486"></canvas>
								</div>
							</div>
							<div class="col-md-4">
								<p class="text-center">
									<strong>Goal Completion</strong>
								</p>

								<div class="progress-group">
									<span class="progress-text">Add Products to Cart</span>
									<span class="progress-number">
										<b>160</b>/200</span>

									<div class="progress sm">
										<div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
									</div>
								</div>
								<div class="progress-group">
									<span class="progress-text">Complete Purchase</span>
									<span class="progress-number">
										<b>310</b>/400</span>

									<div class="progress sm">
										<div class="progress-bar progress-bar-red" style="width: 80%"></div>
									</div>
								</div>
								<div class="progress-group">
									<span class="progress-text">Visit Premium Page</span>
									<span class="progress-number">
										<b>480</b>/800</span>

									<div class="progress sm">
										<div class="progress-bar progress-bar-green" style="width: 80%"></div>
									</div>
								</div>
								<div class="progress-group">
									<span class="progress-text">Send Inquiries</span>
									<span class="progress-number">
										<b>250</b>/500</span>

									<div class="progress sm">
										<div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<div class="row">
							<div class="col-sm-3 col-xs-6">
								<div class="description-block border-right">
									<span class="description-percentage text-green">
										<i class="fa fa-caret-up"></i> 17%</span>
									<h5 class="description-header">$35,210.43</h5>
									<span class="description-text">TOTAL REVENUE</span>
								</div>
							</div>
							<div class="col-sm-3 col-xs-6">
								<div class="description-block border-right">
									<span class="description-percentage text-yellow">
										<i class="fa fa-caret-left"></i> 0%</span>
									<h5 class="description-header">$10,390.90</h5>
									<span class="description-text">TOTAL COST</span>
								</div>
							</div>
							<div class="col-sm-3 col-xs-6">
								<div class="description-block border-right">
									<span class="description-percentage text-green">
										<i class="fa fa-caret-up"></i> 20%</span>
									<h5 class="description-header">$24,813.53</h5>
									<span class="description-text">TOTAL PROFIT</span>
								</div>
							</div>
							<div class="col-sm-3 col-xs-6">
								<div class="description-block">
									<span class="description-percentage text-red">
										<i class="fa fa-caret-down"></i> 18%</span>
									<h5 class="description-header">1200</h5>
									<span class="description-text">GOAL COMPLETIONS</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--Browser-->
			<div class="col-12 col-md-6">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Browser Usage</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse">
								<i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove">
								<i class="fa fa-times"></i>
							</button>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="row">
							<div class="col-8">
								<div class="chart-responsive">
									<canvas id="pieChart"></canvas>
								</div>
								<!-- ./chart-responsive -->
							</div>
							<!-- /.col -->
							<div class="col-4">
								<ul class="chart-legend clearfix">
									<li><i class="fa fa-circle-o text-red"></i> Chrome</li>
									<li><i class="fa fa-circle-o text-green"></i> IE</li>
									<li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
									<li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
									<li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
									<li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
								</ul>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!--Browser-->
			<div class="col-12 col-md-6">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Operating Systems</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse">
								<i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove">
								<i class="fa fa-times"></i>
							</button>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="row">
							<div class="col-8">
								<div class="chart-responsive">
									<canvas id="pieChart"></canvas>
								</div>
								<!-- ./chart-responsive -->
							</div>
							<!-- /.col -->
							<div class="col-4">
								<ul class="chart-legend clearfix">
									<li><i class="fa fa-circle-o text-red"></i> Chrome</li>
									<li><i class="fa fa-circle-o text-green"></i> IE</li>
									<li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
									<li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
									<li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
									<li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
								</ul>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<div class="col-12 col-md-6">
				<div class="box box-info">
					<!-- Info Boxes Style 2 -->
					<div class="info-box bg-yellow">
						<span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Inventory</span>
							<span class="info-box-number">5,200</span>
							<div class="progress">
								<div class="progress-bar" style="width: 50%"></div>
							</div>
							<span class="progress-description">50% Increase in 30 Days</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
					<div class="info-box bg-green">
						<span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Mentions</span>
							<span class="info-box-number">92,050</span>
							<div class="progress">
								<div class="progress-bar" style="width: 20%"></div>
							</div>
							<span class="progress-description">20% Increase in 30 Days</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="box box-info">
					<div class="info-box bg-red">
						<span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Downloads</span>
							<span class="info-box-number">114,381</span>
							<div class="progress">
								<div class="progress-bar" style="width: 70%"></div>
							</div>
							<span class="progress-description">70% Increase in 30 Days</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
					<div class="info-box bg-aqua">
						<span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Direct Messages</span>
							<span class="info-box-number">163,921</span>
							<div class="progress">
							<div class="progress-bar" style="width: 40%"></div>
							</div>
							<span class="progress-description">40% Increase in 30 Days</span>
						</div>
						<!-- /.info-box-content -->
					</div>
				<!-- /.info-box -->
				</div>
			</div>
        </div>
        <!-- /.row -->
    </div>
	<!-- /.col -->
</div>
@endsection
@section('style')
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
@endsection
@section('script')
	<!-- InputMask -->
	<script src="https://adminlte.io/themes/AdminLTE/bower_components/chart.js/Chart.js"></script>
	<script>
	var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
	$(function () {
		/* ChartJS
		 * -------
		 * Here we will create a few charts using ChartJS
		 */

		//--------------
		//- AREA CHART -
		//--------------

		// Get context with jQuery - using jQuery's .get() method.
		var areaChartCanvas = $('#areaChart').get(0).getContext('2d');
		// This will get the first returned node in the jQuery collection.
		var areaChart       = new Chart(areaChartCanvas);

		var areaChartData = {
		  labels  : [@foreach($traffic['this_year'] as $item) months[{{ $item['month'] }}-1], @endforeach],
		  datasets: [
			{
			  label               : 'Last Year',
			  fillColor           : 'rgba(210, 214, 222, 1)',
			  strokeColor         : 'rgba(210, 214, 222, 1)',
			  pointColor          : 'rgba(210, 214, 222, 1)',
			  pointStrokeColor    : '#c1c7d1',
			  pointHighlightFill  : '#fff',
			  pointHighlightStroke: 'rgba(220,220,220,1)',
			  data                : [@foreach($traffic['last_year'] as $item) {{ $item['total'] }}, @endforeach]
			},
			{
			  label               : 'This Year',
			  fillColor           : 'rgba(60,141,188,0.9)',
			  strokeColor         : 'rgba(60,141,188,0.8)',
			  pointColor          : '#3b8bba',
			  pointStrokeColor    : 'rgba(60,141,188,1)',
			  pointHighlightFill  : '#fff',
			  pointHighlightStroke: 'rgba(60,141,188,1)',
			  data                : [@foreach($traffic['this_year'] as $item) {{ $item['total'] }}, @endforeach]
			}
		  ]
		};

		var areaChartOptions = {
		  //Boolean - If we should show the scale at all
		  showScale               : true,
		  //Boolean - Whether grid lines are shown across the chart
		  scaleShowGridLines      : false,
		  //String - Colour of the grid lines
		  scaleGridLineColor      : 'rgba(0,0,0,.05)',
		  //Number - Width of the grid lines
		  scaleGridLineWidth      : 1,
		  //Boolean - Whether to show horizontal lines (except X axis)
		  scaleShowHorizontalLines: true,
		  //Boolean - Whether to show vertical lines (except Y axis)
		  scaleShowVerticalLines  : true,
		  //Boolean - Whether the line is curved between points
		  bezierCurve             : true,
		  //Number - Tension of the bezier curve between points
		  bezierCurveTension      : 0.3,
		  //Boolean - Whether to show a dot for each point
		  pointDot                : false,
		  //Number - Radius of each point dot in pixels
		  pointDotRadius          : 4,
		  //Number - Pixel width of point dot stroke
		  pointDotStrokeWidth     : 1,
		  //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
		  pointHitDetectionRadius : 20,
		  //Boolean - Whether to show a stroke for datasets
		  datasetStroke           : true,
		  //Number - Pixel width of dataset stroke
		  datasetStrokeWidth      : 2,
		  //Boolean - Whether to fill the dataset with a color
		  datasetFill             : true,
		  //String - A legend template
		  legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
		  //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
		  maintainAspectRatio     : true,
		  //Boolean - whether to make the chart responsive to window resizing
		  responsive              : true
		};

		//Create the line chart
		areaChart.Line(areaChartData, areaChartOptions)

		//-------------
		//- LINE CHART -
		//--------------
		var lineChartCanvas          = $('#lineChart').get(0).getContext('2d');
		var lineChart                = new Chart(lineChartCanvas);
		var lineChartOptions         = areaChartOptions;
		lineChartOptions.datasetFill = false;
		lineChart.Line(areaChartData, lineChartOptions);

		//-------------
		//- PIE CHART -
		//-------------
		// Get context with jQuery - using jQuery's .get() method.
		var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
		var pieChart       = new Chart(pieChartCanvas);
		var PieData        = [
		  {
			value    : 700,
			color    : '#f56954',
			highlight: '#f56954',
			label    : 'Chrome'
		  },
		  {
			value    : 500,
			color    : '#00a65a',
			highlight: '#00a65a',
			label    : 'IE'
		  },
		  {
			value    : 400,
			color    : '#f39c12',
			highlight: '#f39c12',
			label    : 'FireFox'
		  },
		  {
			value    : 600,
			color    : '#00c0ef',
			highlight: '#00c0ef',
			label    : 'Safari'
		  },
		  {
			value    : 300,
			color    : '#3c8dbc',
			highlight: '#3c8dbc',
			label    : 'Opera'
		  },
		  {
			value    : 100,
			color    : '#d2d6de',
			highlight: '#d2d6de',
			label    : 'Navigator'
		  }
		]
		var pieOptions     = {
		  //Boolean - Whether we should show a stroke on each segment
		  segmentShowStroke    : true,
		  //String - The colour of each segment stroke
		  segmentStrokeColor   : '#fff',
		  //Number - The width of each segment stroke
		  segmentStrokeWidth   : 2,
		  //Number - The percentage of the chart that we cut out of the middle
		  percentageInnerCutout: 50, // This is 0 for Pie charts
		  //Number - Amount of animation steps
		  animationSteps       : 100,
		  //String - Animation easing effect
		  animationEasing      : 'easeOutBounce',
		  //Boolean - Whether we animate the rotation of the Doughnut
		  animateRotate        : true,
		  //Boolean - Whether we animate scaling the Doughnut from the centre
		  animateScale         : false,
		  //Boolean - whether to make the chart responsive to window resizing
		  responsive           : true,
		  // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
		  maintainAspectRatio  : true,
		  //String - A legend template
		  legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
		};
		//Create pie or douhnut chart
		// You can switch between pie and douhnut using the method below.
		pieChart.Doughnut(PieData, pieOptions);

		//-------------
		//- BAR CHART -
		//-------------
		var barChartCanvas                   = $('#barChart').get(0).getContext('2d');
		var barChart                         = new Chart(barChartCanvas);
		var barChartData                     = areaChartData;
		barChartData.datasets[1].fillColor   = '#00a65a';
		barChartData.datasets[1].strokeColor = '#00a65a';
		barChartData.datasets[1].pointColor  = '#00a65a';
		var barChartOptions                  = {
		  //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
		  scaleBeginAtZero        : true,
		  //Boolean - Whether grid lines are shown across the chart
		  scaleShowGridLines      : true,
		  //String - Colour of the grid lines
		  scaleGridLineColor      : 'rgba(0,0,0,.05)',
		  //Number - Width of the grid lines
		  scaleGridLineWidth      : 1,
		  //Boolean - Whether to show horizontal lines (except X axis)
		  scaleShowHorizontalLines: true,
		  //Boolean - Whether to show vertical lines (except Y axis)
		  scaleShowVerticalLines  : true,
		  //Boolean - If there is a stroke on each bar
		  barShowStroke           : true,
		  //Number - Pixel width of the bar stroke
		  barStrokeWidth          : 2,
		  //Number - Spacing between each of the X value sets
		  barValueSpacing         : 5,
		  //Number - Spacing between data sets within X values
		  barDatasetSpacing       : 1,
		  //String - A legend template
		  legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
		  //Boolean - whether to make the chart responsive
		  responsive              : true,
		  maintainAspectRatio     : true
		};

		barChartOptions.datasetFill = false;
		barChart.Bar(barChartData, barChartOptions);
	});
</script>
@endsection