@extends('backend.master')
@section('content')

	<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
		<div class="col">
			<div class="card radius-10 bg-gradient-deepblue">
			 <div class="card-body">
				<div class="d-flex align-items-center">
					<h5 class="mb-0 text-white">9526</h5>
					<div class="ms-auto">
                        <i class='bx bx-cart fs-3 text-white'></i>
					</div>
				</div>
				<div class="progress my-3 bg-light-transparent" style="height:3px;">
					<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<div class="d-flex align-items-center text-white">
					<p class="mb-0">Total Orders</p>
					<p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
				</div>
			</div>
		  </div>
		</div>
		<div class="col">
			<div class="card radius-10 bg-gradient-orange">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<h5 class="mb-0 text-white">$8323</h5>
					<div class="ms-auto">
                        <i class='bx bx-dollar fs-3 text-white'></i>
					</div>
				</div>
				<div class="progress my-3 bg-light-transparent" style="height:3px;">
					<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<div class="d-flex align-items-center text-white">
					<p class="mb-0">Total Revenue</p>
					<p class="mb-0 ms-auto">+1.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
				</div>
			</div>
		  </div>
		</div>
		<div class="col">
			<div class="card radius-10 bg-gradient-ohhappiness">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<h5 class="mb-0 text-white">6200</h5>
					<div class="ms-auto">
                        <i class='bx bx-group fs-3 text-white'></i>
					</div>
				</div>
				<div class="progress my-3 bg-light-transparent" style="height:3px;">
					<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<div class="d-flex align-items-center text-white">
					<p class="mb-0">Visitors</p>
					<p class="mb-0 ms-auto">+5.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
				</div>
			</div>
		</div>
		</div>
		<div class="col">
			<div class="card radius-10 bg-gradient-ibiza">
			 <div class="card-body">
				<div class="d-flex align-items-center">
					<h5 class="mb-0 text-white">5630</h5>
					<div class="ms-auto">
                        <i class='bx bx-envelope fs-3 text-white'></i>
					</div>
				</div>
				<div class="progress my-3 bg-light-transparent" style="height:3px;">
					<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<div class="d-flex align-items-center text-white">
					<p class="mb-0">Messages</p>
					<p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
				</div>
			</div>
		 </div>
		</div>
	</div><!--end row-->
	<div class="row">
		<div class="col-12 col-lg-8 col-xl-8 d-flex">
		   <div class="card radius-10 w-100">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<h6 class="mb-0">Site Traffic</h6>
					</div>
					<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
					</div>
				</div>
				<div class="d-flex align-items-center ms-auto font-13 gap-2 my-3">
					<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #14abef"></i>New Visitor</span>
					<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #ade2f9"></i>Old Visitor</span>
				</div>
			   <div class="chart-container-1">
				 <canvas id="chart1"></canvas>
			   </div>
			</div>
			<div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">
			  <div class="col">
				<div class="p-3">
				  <h5 class="mb-0">45.87M</h5>
				  <small class="mb-0">Overall Visitor <span> <i class="bx bx-up-arrow-alt align-middle"></i> 2.43%</span></small>
				</div>
			  </div>
			  <div class="col">
				<div class="p-3">
				  <h5 class="mb-0">15:48</h5>
				  <small class="mb-0">Visitor Duration <span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.65%</span></small>
				</div>
			  </div>
			  <div class="col">
				<div class="p-3">
				  <h5 class="mb-0">245.65</h5>
				  <small class="mb-0">Pages/Visit <span> <i class="bx bx-up-arrow-alt align-middle"></i> 5.62%</span></small>
				</div>
			  </div>
			</div>
		   </div>
		</div>
   
		<div class="col-12 col-lg-4 col-xl-4 d-flex">
		   <div class="card radius-10 overflow-hidden w-100">
			  <div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<h6 class="mb-0">Weekly sales</h6>
					</div>
					<div class="font-22 ms-auto text-white"><i class="bx bx-dots-horizontal-rounded"></i>
					</div>
				</div>
				<div class="chart-container-2 my-3">
				  <canvas id="chart2"></canvas>
				 </div>
			  </div>
			  <div class="table-responsive">
				<table class="table align-items-center mb-0">
				  <tbody>
					<tr>
					  <td><i class="bx bxs-circle me-2" style="color: #14abef"></i> Direct</td>
					  <td>$5856</td>
					  <td>+55%</td>
					</tr>
					<tr>
					  <td><i class="bx bxs-circle me-2" style="color: #02ba5a"></i>Affiliate</td>
					  <td>$2602</td>
					  <td>+25%</td>
					</tr>
					<tr>
					  <td><i class="bx bxs-circle me-2" style="color: #d13adf"></i>E-mail</td>
					  <td>$1802</td>
					  <td>+15%</td>
					</tr>
					<tr>
					  <td><i class="bx bxs-circle me-2" style="color: #fba540"></i>Other</td>
					  <td>$1105</td>
					  <td>+5%</td>
					</tr>
				  </tbody>
				</table>
			  </div>
			</div>
		</div>
	</div><!--End Row-->
	<div class="row row-cols-1 row-cols-lg-3">
		<div class="col">
			<div class="card radius-10">
				<div class="card-body">
				    <div class="d-flex align-items-center">
					 <div class="w_chart easy-dash-chart1" data-percent="60">
					   <span class="w_percent"></span>
					 </div>
					 <div class="ms-3">
					   <h6 class="mb-0">Facebook Followers</h6>
					   <small class="mb-0">22.14% <i class='bx bxs-up-arrow align-middle me-1'></i>Since Last Week</small>
					 </div>
					 <div class="ms-auto fs-1 text-facebook"><i class='bx bxl-facebook'></i></div>
				    </div>
				</div>
			</div>
		</div>
		<div class="col">
		   <div class="card radius-10">
			 <div class="card-body">
			   <div class="d-flex align-items-center">
				 <div class="w_chart easy-dash-chart2" data-percent="65">
				   <span class="w_percent"></span>
				 </div>
				 <div class="ms-3">
					<h6 class="mb-0">Twitter Tweets</h6>
					<small class="mb-0">32.15% <i class='bx bxs-up-arrow align-middle me-1'></i>Since Last Week</small>
				  </div>
				  <div class="ms-auto fs-1 text-twitter"><i class='bx bxl-twitter'></i></div>
			   </div>
			 </div>
		   </div>
		</div>
		<div class="col">
		   <div class="card radius-10">
			 <div class="card-body">
			   <div class="d-flex align-items-center">
				 <div class="w_chart easy-dash-chart3" data-percent="75">
				   <span class="w_percent"></span>
				 </div>
				 <div class="ms-3">
					<h6 class="mb-0">Youtube Subscribers</h6>
					<small class="mb-0">58.24% <i class='bx bxs-up-arrow align-middle me-1'></i>Since Last Week</small>
				  </div>
				  <div class="ms-auto fs-1 text-youtube"><i class='bx bxl-youtube'></i></div>
			   </div>
			 </div>
		   </div>
		</div>
	</div><!--End Row-->


@endsection()
@push('js')
<script type="text/javascript">
		$(function() {
			$(".knob").knob();
		});
</script>
@endpush()