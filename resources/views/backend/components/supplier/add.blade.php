<!-- Modal -->
<div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" id="addSupplierStore">
          @csrf
          <div class="modal-body">
              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Name </label>
                <div class="form-group col-sm-10">
                  <input name="name" class="form-control" type="text">
                </div>
              </div>
              <!-- end row -->
              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Mobile </label>
                <div class="form-group col-sm-10">
                  <input name="mobile_no" class="form-control" type="text">
                </div>
              </div>
              <!-- end row -->
              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Email </label>
                <div class="form-group col-sm-10">
                  <input name="email" class="form-control" type="email">
                </div>
              </div>
              <!-- end row -->
              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Address </label>
                <div class="form-group col-sm-10">
                  <input name="address" class="form-control" type="text">
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Supplier</button>
          </div>
      </form>
    </div>
  </div>
</div>
