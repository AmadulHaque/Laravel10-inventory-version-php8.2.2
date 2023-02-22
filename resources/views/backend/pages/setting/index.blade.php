
@extends('backend.master')
@section('content')


<div class="row">
  <div class="col-xl-9 mx-auto">
    <h6 class="mb-0 text-uppercase">Control Setting</h6>
    <hr>
    <div class="card">
      <div class="card-body">
        <form action="{{route('updateSetting')}}" method="POST">
          @csrf
        <div class="border p-3 rounded">
          <div class="mb-3">
            <label class="form-label">Logo Image</label>
            <input type="file" class="form-control" name="Logo" id="Logoimg">
            <img id="showlogo" src="{{asset('images/no_image.jpeg')}}" style="width:100px; height: 100px;" >
          </div>
          <div class="mb-3">
            <label class="form-label">Favicon Image</label>
            <input type="file" class="form-control" name="favicon" id="faviconImg">
            <img id="showFavicon" src="{{asset('images/no_image.jpeg')}}" style="width:100px; height: 100px;" >
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="">
          </div>
          <div class="mb-3">
            <label class="form-label">Phone </label>
            <input type="text" class="form-control" name="phone" value="">
          </div>
          <div class="mb-3">
            <label class="form-label">Shop title </label>
            <input type="text" class="form-control" name="shop_title" value="">
          </div>
          <div class="mb-3">
            <label class="form-label">Address </label>
            <input type="text" class="form-control" name="address" value="">
          </div>
          <div class="mb-3">
            <label class="form-label">Address Two</label>
            <input type="text" class="form-control" name="address_two" value="">
          </div>

          <div class="mb-3">
            <label class="form-label">Header Background</label>
            <input type="color" class="form-control" name="header_color" value="">
          </div>

          <div class="mb-3">
            <label class="form-label">Sideber Background</label>
            <input type="color" class="form-control" name="sideber_color" value="">
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