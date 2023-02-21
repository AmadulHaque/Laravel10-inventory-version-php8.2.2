@extends('backend.master')
@section('content')
<div class="full_scren d-none">
  <img class="" src="{{asset('images/loader/loader2.svg')}}"/>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Daily Invoice Report </h4>
        <br>
        <br>
          <div class="row">
            <div class="col-md-12 text-center">
              <label for="supplier_product_wise"><strong> Supplier Wise Report </strong></label>
              <input type="radio" name="supplier_product_wise" value="supplier_wise" id="supplier_product_wise" class="search_value"> &nbsp;&nbsp;
              
              <label for="product_wise"><strong> Product Wise Report </strong></label>
              <input type="radio" name="supplier_product_wise" id="product_wise" value="product_wise" class="search_value">
            </div>        
          </div>
          

            <!--  /// Supplier Wise  -->
            <div class="show_supplier" style="display:none">
              <form method="GET" action="{{ route('supplier.wise.pdf') }}" id="myForm" >
                  @csrf
                <div class="row">
                  <div class="col-sm-8 form-group">
                    <label>Supplier Name </label>
                    <select name="supplier_id" id="supplier_id" class="form-select select2">
                      <option value="">Select Supplier</option> @foreach($supppliers as $supp) <option value="{{ $supp->id }}">{{ $supp->name }}</option> @endforeach
                    </select>
                  </div>
                  <div class="col-sm-4" style="padding-top: 28px;">
                    <button type="submit" class="btn btn-primary">Search</button>
                  </div>
                </div>
              </form>
            </div>
            <!--  /// End Supplier Wise  -->

            <!--  /// Product Wise  -->
            <div class="show_product" style="display:none; ">
              <form method="GET" action="{{ route('product.wise.pdf') }}" id="myForm">
                <div class="row">
                  <div class="col-md-4">
                    <div class="md-3">
                      <label for="example-text-input" class="form-label">Category Name </label>
                      <select name="category_id" id="category_id" class="form-select select2" aria-label="Default select example">
                        <option selected="">Open this select menu</option> @foreach($category as $cat) <option value="{{ $cat->id }}">{{ $cat->name }}</option> @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="md-3">
                      <label for="example-text-input" class="form-label">Product Name </label>
                      <select name="product_id" id="product_id" class="form-select select2" aria-label="Default select example">
                        <option selected="">Open this select menu</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4" style="padding-top: 28px;">
                    <button type="submit" class="btn btn-primary">Search</button>
                  </div>
                </div>
              </form>

      </div>
    </div>
  </div>
  <!-- end col -->
</div>


<section  class="container">
  <div id="printableArea" class="card d-none">
    <div id="report_val" class="card-body">

    </div>

  </div>
</section>



@endsection()
@push('js')

<script type="text/javascript">
    $(document).ready(function (){
      const Toast = Swal.mixin({
  			toast: true,
  			position: 'top-end',
  			showConfirmButton: false,
  			timer: 3000,
  			timerProgressBar: true,
  			didOpen: (toast) => {
  				toast.addEventListener('mouseenter', Swal.stopTimer)
  				toast.addEventListener('mouseleave', Swal.resumeTimer)
  			}
  		})


      // $(document).on('click', '#cancle_data', function(e){
      //   $('.full_scren').removeClass('d-none');
      //   $('#canclediv').addClass('d-none');
      //   $('#start_date').val("");
      //   $('#end_date').val("");
      //   $('#printableArea').addClass('d-none');

      //   $('.full_scren').addClass('d-none');
      // });




        $(document).on('submit', '#myForm', function(e){
             e.preventDefault();
             let supplier_id = $('#supplier_id').val();
            if (supplier_id=="") {
              Toast.fire({
                  icon: 'error',
                  title:"Select Your Supplier!"
              })
            }else {
             $('.full_scren').removeClass('d-none');

             $.ajax({
                 url: "{{url('/supplier/wise/pdf')}}",
                 type: 'get',
                 data: {supplier_id:supplier_id},
                 dataType:'html',
                 success: function(data) {
                      $('#canclediv').removeClass('d-none');
                      $('#printableArea').removeClass('d-none');
                      $('#report_val').html(data);
                      $('.full_scren').addClass('d-none');
                      Toast.fire({
    											icon: 'success',
    											title:"Report Gone Successfully!"
    									})
                  },
                  error: function(data){
                   $('.full_scren').addClass('d-none');
                    console.log(data);
                 }
             });
            }
        });

});

</script>
<script type="text/javascript">
    $(document).on('change','.search_value', function(){
        var search_value = $(this).val();
        if (search_value == 'supplier_wise') {
            $('.show_supplier').show();
        }else{
            $('.show_supplier').hide();
        }
    }); 
</script>


<script type="text/javascript">
    $(document).on('change','.search_value', function(){
        var search_value = $(this).val();
        if (search_value == 'product_wise') {
            $('.show_product').show();
        }else{
            $('.show_product').hide();
        }
    }); 
</script>
@endpush()
