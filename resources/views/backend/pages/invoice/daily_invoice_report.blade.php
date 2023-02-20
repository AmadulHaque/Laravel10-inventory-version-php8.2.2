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
        <form method="GET">
          @csrf
          <div class="row">
            <div class="col-md-4">
              <div class="md-3 form-group">
                <label for="example-text-input" class="form-label">Start Date</label>
                <input class="form-control example-date-input" name="start_date" type="date" id="start_date" placeholder="YY-MM-DD">
              </div>
            </div>
            <div class="col-md-4">
              <div class="md-3 form-group">
                <label for="example-text-input" class="form-label">End Date</label>
                <input class="form-control example-date-input" name="end_date" type="date" id="end_date" placeholder="YY-MM-DD">
              </div>
            </div>
            <div class="col-md-4">
              <div class="md-3">
                <label for="example-text-input" class="form-label" style="margin-top:43px;"></label>
                <button id="myForm" type="button" class="btn btn-info">Search</button>
              </div>

              <div id="canclediv" class="d-none md-3">
                <label for="example-text-input" class="form-label" style="margin-top:43px;"></label>
                <button id="cancle_data" type="button" class="btn btn-danger">Cancle</button>
              </div>

            </div>
          </div>
          <!-- // end row  -->
        </form>
      </div>
      <!-- End card-body -->
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
        $('#start_date').val("");
        $('#end_date').val("");
        $('#printableArea').addClass('d-none');

        $('.full_scren').addClass('d-none');
      });




        $(document).on('click', '#myForm', function(e){
             e.preventDefault();
            let start_date = $('#start_date').val();
            let end_date = $('#end_date').val();
            if (start_date=="") {
              Toast.fire({
                  icon: 'error',
                  title:"Enter Your Start Date!"
              })
            }else if (end_date=="") {
              Toast.fire({
                  icon: 'error',
                  title:"Enter Your End Date!"
              })
            }else {
             $('.full_scren').removeClass('d-none');
             $.ajax({
                 url: "{{url('/daily/invoice/pdf')}}",
                 type: 'get',
                 data: {start_date:start_date,end_date:end_date},
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
@endpush()
