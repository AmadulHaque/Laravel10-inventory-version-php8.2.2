<!-- Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" id="addCategoryStore">
          @csrf
          <div class="modal-body">
              <div class="row mb-3">
                <label for="example-text-input" class="col-12  col-form-label">Category Name </label>
                <div class="form-group col-12 ">
                  <input name="name" class="form-control" type="text">
                </div>
              </div>
              <!-- end row -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Category</button>
          </div>
      </form>
    </div>
  </div>
</div>
