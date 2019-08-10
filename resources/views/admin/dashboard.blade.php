@extends('main-admin')

@section('main-content')
<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-3">
			<div class="ibox ">
				<div class="ibox-title">
					<span class="label label-success float-right">Monthly</span>
					<h5>Income</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">40 886,200</h1>
					<div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
					<small>Total income</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox ">
				<div class="ibox-title">
					<span class="label label-info float-right">Annual</span>
					<h5>Orders</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">275,800</h1>
					<div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
					<small>New orders</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox ">
				<div class="ibox-title">
					<span class="label label-primary float-right">Today</span>
					<h5>visits</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">106,120</h1>
					<div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
					<small>New visits</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox ">
				<div class="ibox-title">
					<span class="label label-danger float-right">Low value</span>
					<h5>User activity</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">80,600</h1>
					<div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
					<small>In first month</small>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<div class="ibox-title">
					<h5>Orders</h5>
					<div class="float-right">
						<div class="btn-group">
							<button type="button" class="btn btn-xs btn-white active">Today</button>
							<button type="button" class="btn btn-xs btn-white">Monthly</button>
							<button type="button" class="btn btn-xs btn-white">Annual</button>
						</div>
					</div>
				</div>
				<div class="ibox-content">
					<div class="row">
						<div class="col-lg-9">
							<div class="flot-chart">
								<div class="flot-chart-content" id="flot-dashboard-chart"></div>
							</div>
						</div>
						<div class="col-lg-3">
							<ul class="stat-list">
								<li>
									<h2 class="no-margins">2,346</h2>
									<small>Total orders in period</small>
									<div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
									<div class="progress progress-mini">
										<div style="width: 48%;" class="progress-bar"></div>
									</div>
								</li>
								<li>
									<h2 class="no-margins ">4,422</h2>
									<small>Orders in last month</small>
									<div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
									<div class="progress progress-mini">
										<div style="width: 60%;" class="progress-bar"></div>
									</div>
								</li>
								<li>
									<h2 class="no-margins ">9,180</h2>
									<small>Monthly income from orders</small>
									<div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
									<div class="progress progress-mini">
										<div style="width: 22%;" class="progress-bar"></div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="ibox">
				<div class="ibox-title">
					<h5>Map Marker Pondok Pesantren</h5>
				</div>
				<div class="ibox-content">
					<div id="PonPes" style="height: 500px;"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('extra_script')
<script type="text/javascript">
  var map, marker;
	$(document).ready(function() {
		map = L.map('PonPes').setView([-0.789275, 113.9213257], 5);
    L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=JrA8XZ6ajy9lV3aT8OeF', {
      attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a>'})
        .addTo(map);
    get_allMap();
	})

	function get_allMap(){		
    axios.get('{{route('admin.pondok.get_maps')}}')
    .then(function(resp){
    	$.each(resp.data, function(key, val){
				marker = new L.marker([val.pm_latitude, val.pm_longitude])
					.bindPopup(val.p_name)
					.addTo(map);
    	})
    })
	}
</script>
@endsection