
@extends('backend.master')
@section('content')
@php
$setting =DB::table('settings')->first();
@endph
<div class="row">
  <div class="col-xl-9 mx-auto">
    <h6 class="mb-0 text-uppercase">Control Setting</h6>
    <hr>
    <div class="card">
      <div class="card-body">
        <form action="{{route('updateSetting')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="border p-3 rounded">
          <div class="mb-3">
            <label class="form-label">Logo Image</label>
            <input type="file" class="form-control" name="logo_img" id="Logoimg">
            <img id="showlogo" src="{{(!empty($setting->logo)) ? url('images/setting/'.$setting->logo):url('images/profile/no_image.jpeg') }}" style="width:100px; height: 100px;" >
          </div>
          <div class="mb-3">
            <label class="form-label">Favicon Image</label>
            <input type="file" class="form-control" name="favicon" id="faviconImg">
            <img id="showFavicon" src="{{(!empty($setting->favicon)) ? url('images/setting/'.$setting->favicon):url('images/profile/no_image.jpeg') }}" style="width:100px; height: 100px;" >
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{$setting->email}}">
          </div>
          <div class="mb-3">
            <label class="form-label">Phone </label>
            <input type="text" class="form-control" name="phone" value="{{$setting->phone}}">
          </div>
          <div class="mb-3">
            <label class="form-label">Shop title </label>
            <input type="text" class="form-control" name="shop_title" value="{{$setting->shop_title}}">
          </div>
          <div class="mb-3">
            <label class="form-label">Address </label>
            <input type="text" class="form-control" name="address" value="{{$setting->address}}">
          </div>
          <div class="mb-3">
            <label class="form-label">Address Two</label>
            <input type="text" class="form-control" name="address_two" value="{{$setting->address_two}}">
          </div>
          <div class="mb-3">
            <label class="form-label">Currency</label>
            <select name="currency" class="form-control" >
                <option value="$">Choose..</option>
                <option value="$" @if($setting->currency=='$')selected @endif >USD $</option>
                <option value="₹" @if($setting->currency=='₹')selected @endif >INR ₹</option>
                <option value="৳" @if($setting->currency=='৳')selected @endif >BDT ৳</option>
            </select>
          </div>

          <div class="mb-3">
            <button type="submit" class="btn btn-primary" >Update</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection()
@push('js')
<script type="text/javascript">
	$(document).ready(function(){

		$('#Logoimg').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showlogo').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});

	});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#faviconImg').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showFavicon').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });

  });
</script>
@endpush()
