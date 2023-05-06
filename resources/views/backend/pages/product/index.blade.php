
@extends('backend.master')
@section('content')
@php
$setting =DB::table('settings')->first();
@endph
<!--breadcrumb-->
<div class="full_scren d-none">
  <img class="" src="{{asset('images/loader/loader2.svg')}}"/>
</div>
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">Product</div>
  <div class="ps-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">All  Product</li>
      </ol>
    </nav>
  </div>
  <div class="ms-auto">
    <div class="btn-group">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product <i class="lni lni-plus"></i></button>
    </div>
  </div>
</div>
<!--end breadcrumb-->
<hr/>
<div class="card">
  <div class="card-body">

    <div class="d-flex mb-2">
      @include( 'backend.partials.perPage')
     <div class="table-top-right" style="margin: auto;margin-right: auto;margin-right: 0px;">
        <label for="search">Search:</label>
        <input id="search" type="search" id="search" value="{{$searchVal}}">
    </div>
    </div>
    <div id="tableData" class="table-responsive">
      <tr>
        <td><img class="d-block m-auto text-center" src="{{asset('images/loader/loader3.svg')}}"/></td>
      </tr>
    </div>
  </div>
</div>

<!-- add modal -->
@include( 'backend.components.product.add')
<!-- Modal -->
<div class="modal fade" id="EditProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" id="ProductUpdate">
				@csrf
				<div id="edit_val_get" class="modal-body"></div>
        <div  class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update Product</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection()
@push('js')
<!-- validation  -->
<script type="text/javascript">
    $(document).ready(function (){
      $('#image').change(function(e){
          var reader = new FileReader();
          reader.onload = function(e){
              $('#showImage').attr('src',e.target.result);
          }
          reader.readAsDataURL(e.target.files['0']);
      });

        $('#addProductStore').validate({
          rules: {
              name: {
                  required : true,
              },
               supplier_id: {
                  required : true,
              },
               unit_id: {
                  required : true,
              },
               category_id: {
                  required : true,
              },
              brand_id: {
                 required : true,
             },
          },
          messages :{
              name: {
                  required : 'Please Enter Your Product Name',
              },
              supplier_id: {
                  required : 'Please Select One Supplier',
              },
              unit_id: {
                  required : 'Please Select One Unit',
              },
              category_id: {
                  required : 'Please Select One Category',
              },
              brand_id: {
                  required : 'Please Select One Brand',
              }
          },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function (){
        $('#ProductUpdate').validate({
          rules: {
              name: {
                  required : true,
              },
               supplier_id: {
                  required : true,
              },
               unit_id: {
                  required : true,
              },
               category_id: {
                  required : true,
              },
              brand_id: {
                 required : true,
             },

          },
          messages :{
              name: {
                  required : 'Please Enter Your Product Name',
              },
              supplier_id: {
                  required : 'Please Select One Supplier',
              },
              unit_id: {
                  required : 'Please Select One Unit',
              },
              category_id: {
                  required : 'Please Select One Category',
              },
              brand_id: {
                  required : 'Please Select One Brand',
              },
          },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>
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
           url: "{{ url('/products') }}?page="+page,
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

	 // insert row
	 $(document).on('submit', '#addProductStore', function(e){
	      e.preventDefault();
				$('#addProductModal').modal('hide');
				$('.full_scren').removeClass('d-none');
	      let formData = new FormData($("#addProductStore")[0]);
	      $.ajax({
	          url: "{{url('/product/store')}}",
	          type: 'POST',
	          data: formData,
	          processData: false,
	          contentType: false,
	          dataType:'json',
	          success: function(data) {
              if(data.success == 1){
								tableData();
								$('.full_scren').addClass('d-none');
									Toast.fire({
											icon: 'success',
											title:"Product Add Successfully!"
									})
									$('#addProductStore')[0].reset();
              }else{
								$('.full_scren').addClass('d-none');
                  $.each(data[0], function(key, item){
                      toastr.error(item);
                  });
              }

	          },
	          error: function(data){
							$('.full_scren').addClass('d-none');
							Toast.fire({
									icon: 'error',
									title:data,
							})
	             console.log(data);
	          }
	      });
   });

	 //  delete row
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
              url: "/product/remove/"+id,
              success: function (data) {
                if (data.status==305) {
                    Toast.fire({
                       icon: 'info',
                       title:data.message
                   })
                }else{
                   tableData();
                   Toast.fire({
                       icon: 'success',
                       title:"Product Remove Successfully!"
                   })
                }
              }
          });
        }
      })

	 });

	 // edit row
	 $(document).on('click', '.edit_row', function(e){
		 let id = $(this).attr('id_val');
		 	$('.full_scren').removeClass('d-none');
			 $.ajax({
			 		type: 'get',
			 		url: "/product/edit/"+id,
			 		success: function (data) {
							$('.full_scren').addClass('d-none');
							$('#edit_val_get').html(data)
							$('#EditProductModal').modal('show');
			 		}
		 });
	 });


	 // update row
	 $(document).on('submit', '#ProductUpdate', function(e){
	      e.preventDefault();
				$('#EditProductModal').modal('hide');
				$('.full_scren').removeClass('d-none');
	      let formData = new FormData($("#ProductUpdate")[0]);
	      $.ajax({
	          url: "{{url('/product/update')}}",
	          type: 'POST',
	          data: formData,
	          processData: false,
	          contentType: false,
	          dataType:'json',
	          success: function(data) {
              if(data.success == 1){
								tableData();
								$('.full_scren').addClass('d-none');
									Toast.fire({
											icon: 'success',
											title:"Product Update Successfully!"
									})
									$('#ProductUpdate')[0].reset();
              }else{
								$('.full_scren').addClass('d-none');
                  $.each(data[0], function(key, item){
                      toastr.error(item);
                  });
              }
	          },
	          error: function(data){
							$('.full_scren').addClass('d-none');
							Toast.fire({
									icon: 'error',
									title:data,
							})
	             console.log(data);
	          }
	      });
   	});

  });
</script>
@endpush()
