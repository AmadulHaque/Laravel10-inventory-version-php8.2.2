<input type="hidden" name="id" value="{{ $customer->id }}">
<div class="row mb-3">
  <label for="example-text-input" class="col-sm-2 col-form-label">Customer Name </label>
  <div class="form-group col-sm-10">
    <input name="name" value="{{ $customer->name }}" class="form-control" type="text">
  </div>
</div>
<!-- end row -->
<div class="row mb-3">
  <label for="example-text-input" class="col-sm-2 col-form-label">Customer Mobile </label>
  <div class="form-group col-sm-10">
    <input name="mobile_no" value="{{ $customer->mobile_no }}" class="form-control" type="text">
  </div>
</div>
<!-- end row -->
<div class="row mb-3">
  <label for="example-text-input" class="col-sm-2 col-form-label">Customer Email </label>
  <div class="form-group col-sm-10">
    <input name="email" value="{{ $customer->email }}" class="form-control" type="email">
  </div>
</div>
<!-- end row -->
<div class="row mb-3">
  <label for="example-text-input" class="col-sm-2 col-form-label">Customer Address </label>
  <div class="form-group col-sm-10">
    <input name="address" value="{{ $customer->address }}" class="form-control" type="text">
  </div>
</div>
<!-- end row -->
<div class="row mb-3">
  <label for="example-text-input" class="col-sm-2 col-form-label">Customer Image </label>
  <div class="form-group col-sm-10">
    <input name="customer_image" class="form-control" type="file" id="image_edit">
  </div>
</div>
<!-- end row -->
<div class="row mb-3">
  <label for="example-text-input" class="col-sm-2 col-form-label"></label>
  <div class="col-sm-10">
    <img id="showImage_two" width="50%" class="rounded avatar-lg" src="{{ asset($customer->customer_image) }}" alt="Card image cap">
  </div>
</div>
<!-- end row -->
