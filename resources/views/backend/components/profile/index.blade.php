
@extends('backend.master')
@section('content')
@php
$setting =DB::table('settings')->first();
@endphp
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">User Profile</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">User Profilep</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<div class="container">
	<div class="main-body">
		<div class="row">
			<div class="col-lg-4">
				<div class="card">
					<div class="card-body">
						<div class="d-flex flex-column align-items-center text-center">
							<img src="{{(!empty($user->photo)) ? url('images/profile/'.$user->photo):url('images/profile/no_image.jpeg') }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
							<div class="mt-3">
								<h4>{{$user->name}}</h4>
								<p class="text-secondary mb-1">{{$user->username}}</p>
							</div>
						</div>
						<hr class="my-4" />
						<a class="btn btn-primary" href="{{route('admin.change.password')}}">Password Setting</a>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="card">
					<div class="card-body">
						<form action="{{route('admin.profile.update')}}"  method="POST" enctype="multipart/form-data">
							@csrf
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="name" class="form-control" value="{{$user->name}}" />
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">UserName</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="username" class="form-control" value="{{$user->username}}" />
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="email" class="form-control" value="{{$user->email}}" />
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="phone" class="form-control" value="{{$user->phone}}" />
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="address" class="form-control" value="{{$user->address}}" />
								</div>
							</div>


							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Photo</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="file" name="photo" class="form-control"  id="image"   />
								</div>
							</div>


							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0"> </h6>
								</div>
								<div class="col-sm-9 text-secondary">
									 <img id="showImage" src="{{(!empty($user->photo)) ? url('images/profile/'.$user->photo):url('images/profile/no_image.jpeg') }}" alt="Admin" style="width:100px; height: 100px;"  >
								</div>
							</div>


							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" value="Save Changes" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection()
@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});

	});
</script>
@endpush()
