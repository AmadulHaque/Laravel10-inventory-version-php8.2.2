@extends('backend.master')
@section('content')
	@php
	$setting =DB::table('settings')->first();
	@endphp
	<!--start row-->
	<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
		<!-- this top card four data start -->
		<div class="col">
			<div class="card radius-10">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="text-primary indexTopCard font-35">
							<i class="fa-brands fa-shopify root-cc"></i>
						</div>
						<div>
							<p class="mb-0 text-secondary">Total Purchase</p>
							<h4 class="my-1">{{$setting->currency}} <span class="count">{{$purchases}}</span> </h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card radius-10">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="text-primary indexTopCard font-35">
							<i class="fa-solid fa-money-bill-1 fa-xs root-cg" style="color: #45a516;"></i>
						</div>
						<div>
							<p class="mb-0 text-secondary">Total Sales</p>
							<h4 class="my-1">{{$setting->currency}} <span class="count">{{$invoice}}</span></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card radius-10">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="text-primary indexTopCard font-35">
							<i class="fa-solid fa-money-check-dollar fa-sm root-cc"></i>
						</div>
						<div>
							<p class="mb-0 text-secondary">Total Expense</p>
							<h4 class="my-1">{{$setting->currency}} <span class="count">{{$expense}}</span></h4>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card radius-10">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="text-primary indexTopCard font-35">
							<i class="fa-brands fa-product-hunt fa-sm root-cg"></i>
						</div>
						<div>
							<p class="mb-0 text-secondary">Total Product</p>
							<h4 class="my-1"> <span class="count">{{$products}}</span></h4>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- this top card four data end --> 
		<!-- this Bottom card four data start -->
		<div class="col">
			<div class="card radius-10 bg-gradient-deepblue">
			 <div class="card-body">
				<div class="d-flex align-items-center">
					<h5 class="mb-0 text-white">{{$customers}}</h5>
					<div class="ms-auto">
                      <i class="fa-solid fa-user-group fs-3 text-white"></i>
					</div>
				</div>
				<div class="d-flex align-items-center text-white">
					<p class="mb-0">Total Customers</p>
				</div>
			</div>
		  </div>
		</div>
		<div class="col">
			<div class="card radius-10 bg-gradient-orange">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<h5 class="mb-0 text-white">{{$suppliers}}</h5>
					<div class="ms-auto">
                       <i class="fa-solid fa-user-check fs-3 text-white"></i>
					</div>
				</div>
				<div class="d-flex align-items-center text-white">
					<p class="mb-0">Total Suppliers</p>
				</div>
			</div>
		  </div>
		</div>
		<div class="col">
			<div class="card radius-10 bg-gradient-ohhappiness">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{$purchasesCount}}</h5>
						<div class="ms-auto">
	                        <i class="fa-solid fa-file-lines fs-3 text-white"></i>
						</div>
					</div>
					<div class="d-flex align-items-center text-white">
						<p class="mb-0">Purchase Invoice</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card radius-10 bg-gradient-ohhappiness">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{$invoiceCount}}</h5>
						<div class="ms-auto">
	                       <i class="fa-regular fa-file fs-3 text-white"></i>
						</div>
					</div>
					<div class="d-flex align-items-center text-white">
						<p class="mb-0">Sales Invoice</p>
					</div>
				</div>
			</div>
		</div>
		<!-- this Bottom card four data end -->
	</div>
	<!--end row-->
	
	<div class="card shadow-none"> <!--  bg-transparent -->
		<div class="card-body">
			<div id="chart1"></div>
		</div>
	</div>

	<!--start row-->
	<div class="row"> 
		<div class="col-5">
			<!-- stock out  Products -->
			<div class="card radius-10">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div>
							<h5 class="mb-0">Stock Out</h5>
						</div>
						<div class="font-22 ms-auto">
						</div>
					</div>
					<hr>
					<div class="table-responsive">
						<table class="table align-middle mb-0">
							<thead class="table-light">
								<tr>
									<th>Product</th>
									<th>Date</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($productStockOut as $item)
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div class="recent-product-img">
												<img src="{{$item->image}}" alt="">
											</div>
											<div class="ms-2">
												<h6 class="mb-1 font-14">{{$item->name}}</h6>
											</div>
										</div>
									</td>
									<td>{{$item->updated_at}}</td>
									<td>
										<div class="d-flex align-items-center text-danger">	<i class="bx bx-radio-circle-marked bx-burst bx-rotate-90 align-middle font-18 me-1"></i>
											<span>Stock Out</span>
										</div>
									</td>
									<td>
										<div class="d-flex order-actions">
											<a href="{{url('/products')}}?search={{$item->name}}" class=""><i class="bx bx-cog"></i></a>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-7">
			<!-- recently -->
			<div class="card radius-10">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div>
							<h5 class="mb-0">Recently Sale</h5>
						</div>
						<div class="font-22 ms-auto">
						</div>
					</div>
					<hr>
					<div class="table-responsive">
						<table class="table align-middle mb-0">
							<thead class="table-light">
								<tr>
									<th>Order id</th>
									<th>Product</th>
									<th>Date</th>
									<th>Price</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								@foreach($saleList as $item)
								<tr>
									<td>#{{$item->invoice_id}}</td>
									<td>
										<div class="d-flex align-items-center">
											<div class="recent-product-img">
												<img src="{{$item['product']['image']}}" alt="">
											</div>
											<div class="ms-2">
												<h6 class="mb-1 font-14">{{$item['product']['name']}}</h6>
											</div>
										</div>
									</td>
									<td>{{$item->date}}</td>
									<td>{{$setting->currency}} {{$item->selling_price}}</td>
									<td>
										@if($item->status=='0')
										<div class="d-flex align-items-center text-danger">
											<i class="bx bx-radio-circle-marked bx-burst bx-rotate-90 align-middle font-18 me-1"></i>
											<span>Pending</span>
										</div>
										@else
										<div class="d-flex align-items-center text-success">
											<i class="bx bx-radio-circle-marked bx-burst bx-rotate-90 align-middle font-18 me-1"></i>
											<span>Completed</span>
										</div>
										@endif
									</td>
									
								</tr>
								@endforeach

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!--end row-->

@endsection()
@push('js')
<script src="{{asset('backend/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
<script type="text/javascript">
	$(function() {
		$('.count').each(function () {
		    $(this).prop('Counter',0).animate({
		        Counter: $(this).text()
		    }, {
		        duration: 2000,
		        easing: 'swing',
		        step: function (now) {
		            $(this).text(Math.ceil(now));
		        }
		    });
		});
	});
</script>
<script>
	$(function() {
	"use strict";
	var e = {
		series: [{
			name: "Sales",  
			data: {{ Js::from($datas) }},
		}],

		chart: {
			foreColor: "#9ba7b2",
			height: 310,
			type: "area",
			toolbar: {
				show: !0
			},
			zoom: {
				enabled: !1
			},
			dropShadow: {
				enabled: !0,
				top: 3,
				left: 14,
				blur: 4,
				opacity: .1
			}
		},
		stroke: {
			width: 5,
			curve: "smooth"
		},
		xaxis: {
			categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		},
		title: {
			text: "Sales",
			align: "left",
			style: {
				fontSize: "16px",
				color: "#666"
			}
		},
		fill: {
			type: "gradient",
			gradient: {
				shade: "light",
				gradientToColors: ["#0d6efd"],
				shadeIntensity: 1,
				type: "vertical",
				opacityFrom: .7,
				opacityTo: .2,
				stops: [0, 100, 100, 100]
			}
		},
		markers: {
			size: 5,
			colors: ["#0d6efd"],
			strokeColors: "#fff",
			strokeWidth: 2,
			hover: {
				size: 7
			}
		},
		dataLabels: {
			enabled: !1
		},
		colors: ["#0d6efd"],
		
	};
	new ApexCharts(document.querySelector("#chart1"), e).render();
});
</script>
@endpush()
