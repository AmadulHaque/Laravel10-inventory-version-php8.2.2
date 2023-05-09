<!-- Modal -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer Add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="customerStore" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row">
              <label for="example-text-input" class="col-12  col-form-label">Customer Name </label>
              <div class="form-group col-12 ">
                <input name="name" class="form-control" type="text">
              </div>
            </div>
            <!-- end row -->
            <div class="row">
              <label for="example-text-input" class="col-12  col-form-label">Customer Mobile </label>
              <div class="form-group col-12 ">
                <input name="mobile_no" class="form-control" type="text">
              </div>
            </div>
            <!-- end row -->
            <div class="row">
              <label for="example-text-input" class="col-12  col-form-label">Customer Email </label>
              <div class="form-group col-12 ">
                <input name="email" class="form-control" type="email">
              </div>
            </div>
            <!-- end row -->
            <div class="row">
              <label for="example-text-input" class="col-12  col-form-label">Customer Address </label>
              <div class="form-group col-12 ">
                <input name="address" class="form-control" type="text">
              </div>
            </div>
            <!-- end row -->
            <div class="row">
              <label for="example-text-input" class="col-12  col-form-label">Customer Image </label>
              <div class="form-group col-12 ">
                <input name="customer_image" class="form-control" type="file" id="image">
              </div>
            </div>
            <!-- end row -->
            <div class="row">
              <label for="example-text-input" class="col-12  col-form-label"></label>
              <div class="col-12 ">
                <img id="showImage" class="showImage rounded avatar-lg" src="" alt="Customer Image">
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Customer</button>
          </div>
      </form>
    </div>
  </div>
</div>
