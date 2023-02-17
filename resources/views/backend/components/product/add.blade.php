<!-- Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" id="addProductStore">
          @csrf
          <div class="modal-body">

            <div class="row mb-3">
              <label for="example-text-input" class="col-sm-2 col-form-label">Product Name </label>
              <div class="form-group col-sm-10">
                <input name="name" class="form-control" type="text">
              </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Supplier Name </label>
              <div class="col-sm-10">
                <select name="supplier_id" class="form-select" aria-label="Default select example">
                  <option selected="" value="">Open this select menu</option>
                   @foreach($supplier as $supp)
                    <option value="{{ $supp->id }}">{{ $supp->name }}</option>
                   @endforeach
                </select>
              </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Unit Name </label>
              <div class="col-sm-10">
                <select name="unit_id" class="form-select" aria-label="Default select example">
                  <option selected="" value="">Open this select menu</option>
                   @foreach($unit as $uni)
                      <option value="{{ $uni->id }}">{{ $uni->name }}</option>
                   @endforeach
                </select>
              </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Category Name </label>
              <div class="col-sm-10">
                <select name="category_id" class="form-select" aria-label="Default select example">
                  <option selected="" value="" >Open this select menu</option>
                  @foreach($category as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Brand Name </label>
              <div class="col-sm-10">
                <select name="brand_id" class="form-select" aria-label="Default select example">
                  <option selected="" value="" >Open this select menu</option>
                  @foreach($brand as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <!-- end row -->
            <div class="row mb-3">
              <label for="example-text-input" class="col-sm-2 col-form-label">Thumbnail Image </label>
              <div class="form-group col-sm-10">
                <input name="image" class="form-control" type="file" id="image">
              </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
              <label for="example-text-input" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <img id="showImage" style="width:50%" class="rounded avatar-lg" src="{{  url('images/no_image.jpeg') }}" alt="Card image cap">
              </div>
            </div>
            <!-- end row -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Product</button>
          </div>
      </form>
    </div>
  </div>
</div>
