
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
  <div class="breadcrumb-title pe-3">Purchase</div>
  <div class="ps-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">All  Purchase</li>
      </ol>
    </nav>
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

<!-- Modal -->
<div class="modal fade" id="EditPurchaseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" id="PurchaseUpdate">
				@csrf
				<div id="edit_val_get" class="modal-body"></div>
        <div  class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update Purchase</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection()
@push('js')

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
           url: "{{ url('/purchases') }}?page="+page,
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

	 // delete row
   $(document).on('click', '.delete_row', function(e){
		 let id = $(this).attr('id_val');

     const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })
      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
              type: 'get',
              url: "/purchase/remove/"+id,
              success: function (data) {
                   tableData();
                   Toast.fire({
                       icon: 'success',
                       title:"Purchase Remove Successfully!"
                   })
              }
          });
        }
      })

	 });


  });
</script>
@endpush()
