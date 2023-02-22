<!doctype html>
<html lang="en" class="">
<!-- color-sidebar sidebarcolor1 color-header headercolor7 -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('backend/assets/images/favicon-32x32.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
	<link href="{{asset('backend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('backend/assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('backend/assets/js/pace.min.js')}}"></script>

	<!-- Bootstrap CSS -->
	<link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('backend/assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('backend/assets/css/icons.css')}}" rel="stylesheet">
	<!--  Style CSS -->
	<link href="{{asset('backend/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

		<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('backend/assets/css/dark-theme.css')}}" />
	<link rel="stylesheet" href="{{asset('backend/assets/css/semi-dark.css')}}" />
	<link rel="stylesheet" href="{{asset('backend/assets/css/header-colors.css')}}" />
	<title>Mona Inventory Management</title>
</head>
<style media="screen">
.full_scren {
	position: fixed;
	z-index: 1111111111;
	width: 100%;
	background: #fff;
	height: 100%;
	top: 61px;
}
.full_scren img{
	margin-left: 32% !important;
	margin-top: 14%;
	width: 98px;
}
</style>
<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
			@include( 'backend.partials.sideber')
		<!--end sidebar wrapper -->

		<!--start header -->
			@include( 'backend.partials.navber')
		<!--end header -->

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				@yield('content')
			</div>
		</div>
		<!--end page wrapper -->

		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © {{date('Y')}}. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->


	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="header_color_set indigator headercolor1" bg="color-header headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="header_color_set indigator headercolor2" bg="color-header headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="header_color_set indigator headercolor3" bg="color-header headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="header_color_set indigator headercolor4" bg="color-header headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="header_color_set indigator headercolor5" bg="color-header headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="header_color_set indigator headercolor6" bg="color-header headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="header_color_set indigator headercolor7" bg="color-header headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="header_color_set indigator headercolor8" bg="color-header headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>

			<hr/>
			<h6 class="mb-0">Sidebar Backgrounds</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="sideber_color_set indigator sidebarcolor1" bg="color-sidebar  sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="sideber_color_set indigator sidebarcolor2" bg="color-sidebar  sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="sideber_color_set indigator sidebarcolor3" bg="color-sidebar  sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="sideber_color_set indigator sidebarcolor4" bg="color-sidebar  sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="sideber_color_set indigator sidebarcolor5" bg="color-sidebar  sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="sideber_color_set indigator sidebarcolor6" bg="color-sidebar  sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="sideber_color_set indigator sidebarcolor7" bg="color-sidebar  sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="sideber_color_set indigator sidebarcolor8" bg="color-sidebar  sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!--end switcher-->


	<!-- Bootstrap JS -->
	<script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/chartjs/js/Chart.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
  	<script src="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/sparkline-charts/jquery.sparkline.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/jquery-knob/excanvas.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/jquery-knob/jquery.knob.js')}}"></script>
 	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="{{asset('backend/assets/js/validate.min.js')}}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<!--app JS-->

	<script src="{{asset('backend/assets/plugins/select2/js/select2.min.js')}}"></script>
	<script src="{{ asset('backend/assets/js/handlebars.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" ></script>

	<script type="text/javascript">
		$(function(){
			$(document).ajaxStart(function() { Pace.start(); });
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

		 	@if(Session::has('message'))
		      	var type="{{Session::get('alert-type','info')}}"
		      	switch(type){
		          	case 'info':
	               		Toast.fire({
						  icon: 'info',
						  title:"{{ Session::get('message') }}"
						})
		               break;
		          	case 'success':
	               		Toast.fire({
						  icon: 'success',
						  title:"{{ Session::get('message') }}"
						})
		              break;
		          	case 'warning':
	               		Toast.fire({
						  icon: 'warning',
						  title:"{{ Session::get('message') }}"
						})
		              break;
		          	case 'error':
	               		Toast.fire({
						  icon: 'error',
						  title:"{{ Session::get('message') }}"
						})
		              break;
		            }
		    @endif

		})
	</script>
	<script src="{{asset('backend/assets/js/app.js')}}"></script>
	<script type="text/javascript">
		$(function() {
			Pace.stop();


			$('.header_color_set').click(function(){
				let bg = $(this).attr('bg');
				$.ajax({
					url:'/setting/header_bg',
					type:'get',
					data:{bg:bg},
					success:function(data){
						location.reload();
					},
				})
			})

			$('.sideber_color_set').click(function(){
				let bg = $(this).attr('bg');
				$.ajax({
					url:'/setting/sideber_bg',
					type:'get',
					data:{bg:bg},
					success:function(data){
						location.reload();
					},
				})

			})
		})
	</script>
	@stack('js')

</body>

</html>
