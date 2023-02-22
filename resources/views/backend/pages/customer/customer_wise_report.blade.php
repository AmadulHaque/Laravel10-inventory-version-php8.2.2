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
               <label for="v1"><strong> Customer Wise Credit Report </strong></label>
               <input type="radio" id="v1" name="customer_wise_report" value="customer_wise_credit" class="search_value"> &nbsp;&nbsp; 

               <label for="v2"><strong> Customer Wise Paid Report </strong></label>
               <input type="radio" id="v2" name="customer_wise_report" value="customer_wise_paid" class="search_value">
             </div>
           </div>

            <div class="show_credit" style="display:none">
              <form method="GET" id="myForm">
                @csrf
                <div class="row">
                  <div class="col-sm-8 form-group">
                    <label>Customer Name </label>
                    <select name="customer_id" id="customer_id" class="form-select select2">
                      <option value="">Select Customer</option> @foreach($customers as $cus) <option value="{{ $cus->id }}">{{ $cus->name }}</option> @endforeach
                    </select>
                  </div>
                  <div class="col-sm-4" style="padding-top: 28px;">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <div id="canclediv" class="d-none md-3">
                      <label for="example-text-input" class="form-label" style="margin-top:43px;"></label>
                      <button id="cancle_data" type="button" class="btn btn-danger">Cancle</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <!--  /// End Customer Credit Wise  -->

            <!--  /// show_paid  -->
            <div class="show_paid" style="display:none">
              <form method="GET" action="{{ route('customer.wise.paid.report') }}" id="myForm2">
                <div class="row">
                  <div class="col-sm-8 form-group">
                    <label>Customer Name </label>
                    <select id="customer_id2" name="customer_id" class="form-select select2">
                      <option value="">Select Customer</option> @foreach($customers as $cus) <option value="{{ $cus->id }}">{{ $cus->name }}</option> @endforeach
                    </select>
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

    $(document).on('click', '#cancle_data', function(e){
      $('.full_scren').removeClass('d-none');
      $('#canclediv').addClass('d-none');
      $('.show_supplier').hide();
      $('.show_product').hide();
      $('#printableArea').addClass('d-none');

      $('.full_scren').addClass('d-none');
    });

    $(document).on('submit', '#myForm', function(e){
         e.preventDefault();
         let customer_id = $('#customer_id').val();
        if (customer_id=="") {
          Toast.fire({
              icon: 'error',
              title:"Select Your Customer!"
          })
        }else {
         $('.full_scren').removeClass('d-none');

         $.ajax({
             url: "{{url('/customer/wise/credit/report')}}",
             type: 'get',
             data: {customer_id:customer_id},
             dataType:'html',
             success: function(data) {
                  $('#canclediv').removeClass('d-none');
                  $('#printableArea').removeClass('d-none');
                  $('#report_val').html(data);
                  $('.full_scren').addClass('d-none');
                  Toast.fire({
											icon: 'success',
											title:"Report Successfully!"
									})
              },
              error: function(data){
               $('.full_scren').addClass('d-none');
                console.log(data);
             }
         });
        }
    });

    $(document).on('submit', '#myForm2', function(e){
         e.preventDefault();
         let customer_id = $('#customer_id2').val();
        if (customer_id=="") {
          Toast.fire({
              icon: 'error',
              title:"Select Your Customer!"
          })
        }else {
         $('.full_scren').removeClass('d-none');

         $.ajax({
             url: "{{url('/customer/wise/paid/report')}}",
             type: 'get',
             data: {customer_id:customer_id},
             dataType:'html',
             success: function(data) {
                  $('#canclediv').removeClass('d-none');
                  $('#printableArea').removeClass('d-none');
                  $('#report_val').html(data);
                  $('.full_scren').addClass('d-none');
                  Toast.fire({
                      icon: 'success',
                      title:"Report Successfully!"
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
        if (search_value == 'customer_wise_credit') {
            $('.show_credit').show();
        }else{
            $('.show_credit').hide();
        }
    }); 
</script>

<script type="text/javascript">
    $(document).on('change','.search_value', function(){
        var search_value = $(this).val();
        if (search_value == 'customer_wise_paid') {
            $('.show_paid').show();
        }else{
            $('.show_paid').hide();
        }
    }); 
</script>

@endpush()
