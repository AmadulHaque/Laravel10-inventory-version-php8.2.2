
  <input type="hidden" name="id" value="{{$data->id}}">
  <div class="row mb-3">
    <label for="example-text-input" class="col-12  col-form-label">Supplier Name </label>
    <div class="form-group col-sm-10">
      <input name="name" class="form-control" type="text" value="{{$data->name}}">
    </div>
  </div>
  <!-- end row -->
  <div class="row mb-3">
    <label for="example-text-input" class="col-12  col-form-label">Supplier Mobile </label>
    <div class="form-group col-sm-10">
      <input name="mobile_no" class="form-control" type="text" value="{{$data->mobile_no}}">
    </div>
  </div>
  <!-- end row -->
  <div class="row mb-3">
    <label for="example-text-input" class="col-12  col-form-label">Supplier Email </label>
    <div class="form-group col-sm-10">
      <input name="email" class="form-control" type="email" value="{{$data->email}}">
    </div>
  </div>
  <!-- end row -->
  <div class="row mb-3">
    <label for="example-text-input" class="col-12  col-form-label">Supplier Address </label>
    <div class="form-group col-sm-10">
      <input name="address" class="form-control" type="text" value="{{$data->address}}">
    </div>
  </div>
