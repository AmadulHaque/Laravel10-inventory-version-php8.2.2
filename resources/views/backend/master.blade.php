<!doctype html>
<html lang="en" class="{{Auth::user()->header_color}} {{Auth::user()->sideber_color}}">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->  
	<link rel="icon" href="{{$setting->favicon ? 'images/setting/'.$setting->favicon : 'backend/assets/images/favicon-32x32.png'}}" type="image/png" />
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
	<link rel="stylesheet" href="{{asset('backend/assets/css/toastr.css')}}" />
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('backend/assets/css/dark-theme.css')}}" />
	<link rel="stylesheet" href="{{asset('backend/assets/css/semi-dark.css')}}" />
	<link rel="stylesheet" href="{{asset('backend/assets/css/header-colors.css')}}" />
	<title>Mona Inventory Management </title>
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
			<div class="page-content" style="height: 1100px !important">
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
	<style media="screen">
		#calculator {
			width: 325px;
			height: auto;
			/* margin: 100px auto; */
			padding: 20px 20px 9px;
			/* background: #9dd2ea; */
			background: linear-gradient(#9dd2ea, #8bceec);
			border-radius: 3px;
			box-shadow: 0px 4px #009de4, 0px 10px 15px rgba(0, 0, 0, 0.2);
		}
		.top span.clear {
			float: left;
		}
		.top .screen {
			height: 40px;
			width: 212px;
			float: right;
			padding: 0 10px;
			background: rgba(0, 0, 0, 0.2);
			border-radius: 3px;
			box-shadow: inset 0px 4px rgba(0, 0, 0, 0.2);
			font-size: 17px;
			line-height: 40px;
			color: white;
			text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
			text-align: right;
			letter-spacing: 1px;
		}
		.keys, .top {overflow: hidden;}
		.keys span, .top span.clear {
		float: left;
		position: relative;
		top: 0;
		cursor: pointer;
		width: 66px;
		height: 36px;
		background: white;
		border-radius: 3px;
		box-shadow: 0px 4px rgba(0, 0, 0, 0.2);
		margin: 0 7px 11px 0;
		color: #888;
		line-height: 36px;
		text-align: center;
		user-select: none;
		transition: all 0.2s ease;
		}
		.keys span.operator {
			background: #FFF0F5;
			margin-right: 0;
		}
		.keys span.eval {
			background: #f1ff92;
			box-shadow: 0px 4px #9da853;
			color: #888e5f;
		}

		.top span.clear {
			background: #ff9fa8;
			box-shadow: 0px 4px #ff7c87;
			color: white;
		}
		.keys span:hover {
			background: #9c89f6;
			box-shadow: 0px 4px #6b54d3;
			color: white;
		}
		.keys span.eval:hover {
			background: #abb850;
			box-shadow: 0px 4px #717a33;
			color: #ffffff;
		}

		.top span.clear:hover {
			background: #f68991;
			box-shadow: 0px 4px #d3545d;
			color: white;
		}
		.keys span:active {
			box-shadow: 0px 0px #6b54d3;
			top: 4px;
		}
		.keys span.eval:active {
			box-shadow: 0px 0px #717a33;
			top: 4px;
		}
		.top span.clear:active {
			top: 4px;
			box-shadow: 0px 0px #d3545d;
		}
	</style>
	<!-- calculator start -->
	<div class="modal fade" id="calculatorModal"style="display: none;">
		<div class="modal-dialog " style="width:355px !important">
			<div class="modal-content">
				<div class="modal-body">

					<div id="calculator">
						<!-- Screen and clear key -->
						<div class="top">
							<span class="clear">C</span>
							<div class="screen"></div>
						</div>

						<div class="keys">
							<!-- operators and other keys -->
							<span>7</span>
							<span>8</span>
							<span>9</span>
							<span class="operator">+</span>
							<span>4</span>
							<span>5</span>
							<span>6</span>
							<span class="operator">-</span>
							<span>1</span>
							<span>2</span>
							<span>3</span>
							<span class="operator">÷</span>
							<span>0</span>
							<span>.</span>
							<span class="eval">=</span>
							<span class="operator">x</span>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- calculator end -->

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
					<button type="button" class="header_color_set btn btn-outline-danger" bg=" ">None</button>
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
					<button type="button" class="sideber_color_set btn btn-outline-danger" bg=" ">None</button>

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

<script type="text/javascript">
// Get all the keys from document
var keys = document.querySelectorAll('#calculator span');
var operators = ['+', '-', 'x', '÷'];
var decimalAdded = false;

// Add onclick event to all the keys and perform operations
for(var i = 0; i < keys.length; i++) {
 keys[i].onclick = function(e) {
	 // Get the input and button values
	 var input = document.querySelector('.screen');
	 var inputVal = input.innerHTML;
	 var btnVal = this.innerHTML;

	 // Now, just append the key values (btnValue) to the input string and finally use javascript's eval function to get the result
	 // If clear key is pressed, erase everything
	 if(btnVal == 'C') {
		 input.innerHTML = '';
		 decimalAdded = false;
	 }

	 // If eval key is pressed, calculate and display the result
	 else if(btnVal == '=') {
		 var equation = inputVal;
		 var lastChar = equation[equation.length - 1];

		 // Replace all instances of x and ÷ with * and / respectively. This can be done easily using regex and the 'g' tag which will replace all instances of the matched character/substring
		 equation = equation.replace(/x/g, '*').replace(/÷/g, '/');

		 // Final thing left to do is checking the last character of the equation. If it's an operator or a decimal, remove it
		 if(operators.indexOf(lastChar) > -1 || lastChar == '.')
			 equation = equation.replace(/.$/, '');

		 if(equation)
			 input.innerHTML = eval(equation);

		 decimalAdded = false;
	 }

	 // Basic functionality of the calculator is complete. But there are some problems like
	 // 1. No two operators should be added consecutively.
	 // 2. The equation shouldn't start from an operator except minus
	 // 3. not more than 1 decimal should be there in a number

	 // We'll fix these issues using some simple checks

	 // indexOf works only in IE9+
	 else if(operators.indexOf(btnVal) > -1) {
		 // Operator is clicked
		 // Get the last character from the equation
		 var lastChar = inputVal[inputVal.length - 1];

		 // Only add operator if input is not empty and there is no operator at the last
		 if(inputVal != '' && operators.indexOf(lastChar) == -1)
			 input.innerHTML += btnVal;

		 // Allow minus if the string is empty
		 else if(inputVal == '' && btnVal == '-')
			 input.innerHTML += btnVal;

		 // Replace the last operator (if exists) with the newly pressed operator
		 if(operators.indexOf(lastChar) > -1 && inputVal.length > 1) {
			 // Here, '.' matches any character while $ denotes the end of string, so anything (will be an operator in this case) at the end of string will get replaced by new operator
			 input.innerHTML = inputVal.replace(/.$/, btnVal);
		 }

		 decimalAdded =false;
	 }

	 // Now only the decimal problem is left. We can solve it easily using a flag 'decimalAdded' which we'll set once the decimal is added and prevent more decimals to be added once it's set. It will be reset when an operator, eval or clear key is pressed.
	 else if(btnVal == '.') {
		 if(!decimalAdded) {
			 input.innerHTML += btnVal;
			 decimalAdded = true;
		 }
	 }

	 // if any other key is pressed, just append it
	 else {
		 input.innerHTML += btnVal;
	 }

	 // prevent page jumps
	 e.preventDefault();
 }
}
</script>
</body>

</html>
