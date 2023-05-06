
@extends('backend.master')
@section('content')
  @php
  $setting =DB::table('settings')->first();
  @endphp
<!--breadcrumb-->
<div class="full_scren d-none">
  <img class="" src="{{asset('images/loader/loader2.svg')}}"/>
</div>
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">Customer</div>
  <div class="ps-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">All Credit Customer</li>
      </ol>
    </nav>
  </div>
  <div class="ms-auto">
    <div class="btn-group">
      <a href="{{route('paid.customer.print.pdf')}}" target="_blank" class="btn btn-danger">Paid Customer Print <i class="lni lni-printer"></i> </a>
    </div>
  </div>
</div>
<!--end breadcrumb-->
<hr/>
<div class="card">
  <div class="card-body">

    <div class="d-flex mb-2">
      @include( 'backend.partials.perPage')
      @include( 'backend.partials.search')
    </div>
    <div id="tableData" class="table-responsive">
      <tr>
        <td><img class="d-block m-auto text-center" src="{{asset('images/loader/loader3.svg')}}"/></td>
      </tr>
    </div>
  </div>
</div>

<!-- add modal -->

@endsection()
@push('js')
<!-- validation  -->
<script>
  $(document).ready(function() {
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
    tableData();
    function tableData(page=1){
       var search = $("#search").val();
       var perPage = $("#perpage").val();
      $.ajax({
           type: 'get',
           url: "{{ url('/paid/customer') }}?page="+page,
           dataType: 'html',
           data: {
               search: search,
               perPage: perPage
           },
           success: function (data) {
               $("#tableData").html(data);
               Pace.stop();
           }
       });
    }
   // table search perpage pagination setup start
   $(document).on('change', '#perpage', function (e) {
       e.preventDefault();
       tableData();
   });
   $(document).on('keyup', '#search', function (e) {
       e.preventDefault();
       tableData();
   });
   $(document).on('click', '.pagination a', function (e) {
       e.preventDefault();
       let page = $(this).attr('href').split('page=')[1];
       if (page) {
           tableData(page);
					 console.log(page);
       }
   });
   // table search perpage pagination setup end
  });
</script>
@endpush()
