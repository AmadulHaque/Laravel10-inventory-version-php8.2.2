<!doctype html>
<html lang="en" class="">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->  
	<link rel="icon" href="{{$setting->favicon ? 'images/setting/'.$setting->favicon : 'backend/assets/images/favicon-32x32.png'}}" type="image/png" />
	<!--plugins-->
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
	<link rel="stylesheet" href="{{asset('backend/assets/css/toastr.css')}}" />
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('backend/assets/css/semi-dark.css')}}" />
	<link rel="stylesheet" href="{{asset('backend/assets/css/header-colors.css')}}" />
	<link rel="stylesheet" href="{{asset('backend/assets/css/all.min.css')}}" />
	<link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}" />
	<title>Amad Inventory Management </title>
</head>
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

	<!-- Bootstrap JS -->
	<script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
 	<script src="{{asset('backend/assets/js/sweetalert2.js')}}"></script>
	<script src="{{asset('backend/assets/js/validate.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/toastr.js')}}"></script>
	<script src="{{asset('backend/assets/js/notify.min.js')}}"></script>
	<!--app JS-->
	<script src="{{asset('backend/assets/plugins/select2/js/select2.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/handlebars.js') }}"></script>

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
		    Pace.stop()
		})
	</script>
	<script src="{{asset('backend/assets/js/app.js')}}"></script>
@stack('js')
</body>

</html>
