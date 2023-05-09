
  <input type="hidden" name="id" value="{{$product->id}}">



  <div class="row ">
    <label for="example-text-input" class="col-12  col-form-label">Product Name </label>
    <div class="form-group col-12 ">
      <input name="name" value="{{ $product->name }}" class="form-control" type="text">
    </div>
  </div>
  <!-- end row -->
  <div class="row ">
    <label class="col-12  col-form-label">Supplier Name </label>
    <div class="col-12 ">
      <select name="supplier_id" class="form-select" aria-label="Default select example">
        <option selected="" value="">Open this select menu</option>
        @foreach($supplier as $supp)
          <option value="{{ $supp->id }}" {{ $supp->id == $product->supplier_id ? 'selected' : '' }}>{{ $supp->name }}</option>
         @endforeach
      </select>
    </div>
  </div>
  <!-- end row -->
  <div class="row ">
    <label class="col-12  col-form-label">Unit Name </label>
    <div class="col-12 ">
      <select name="unit_id" class="form-select" aria-label="Default select example">
        <option selected="" value="">Open this select menu</option>
         @foreach($unit as $uni)
          <option value="{{ $uni->id }}" {{ $uni->id == $product->unit_id ? 'selected' : '' }}>{{ $uni->name }}</option>
         @endforeach
      </select>
    </div>
  </div>
  <!-- end row -->
  <div class="row ">
    <label class="col-12  col-form-label">Category Name </label>
    <div class="col-12 ">
      <select name="category_id" class="form-select" aria-label="Default select example">
        <option selected="" value="">Open this select menu</option>
         @foreach($category as $cat)
          <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
         @endforeach
      </select>
    </div>
  </div>


  <div class="row ">
    <label class="col-12  col-form-label">Brand Name </label>
    <div class="col-12 ">
      <select name="brand_id" class="form-select" aria-label="Default select example">
        <option selected="" value="">Open this select menu</option>
         @foreach($brand as $item)
          <option value="{{ $item->id }}" {{ $item->id == $product->brand_id ? 'selected' : '' }}>{{ $item->name }}</option>
         @endforeach
      </select>
    </div>
  </div>
  <!-- end row -->


  <!-- end row -->
  <div class="row ">
    <label for="example-text-input" class="col-12  col-form-label">Thumbnail Image </label>
    <div class="form-group col-12 ">
      <input name="image" class="form-control" type="file" id="image2">
    </div>
  </div>
  <!-- end row -->
  <div class="row ">
    <label for="example-text-input" class="col-12  col-form-label"></label>
    <div class="col-12 ">
      <img id="showImage2" style="width:50%" class="rounded avatar-lg" src="{{ $product->image ? $product->image : '' }}" alt="Card image cap">
    </div>
  </div>
  <script type="text/javascript">
      $(document).ready(function (){
        $('#image2').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage2').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
      });

</script>
