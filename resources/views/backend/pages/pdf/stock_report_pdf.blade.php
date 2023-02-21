@extends('backend.master')
@section('content')

<div  class=" row">
  <div class="col-12">
    <div id="printableArea" class="card">
      <div  class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-6 mt-4">
                <address>
                  <strong>Easy Shopping Mall:</strong>
                  <br> Purana Palton Dhaka <br> support@easylearningbd.com
                </address>
              </div>
            </div>
          </div>
        </div> 

        <div class="row">
          <div class="col-12">
            <div>
              <div class="p-2"></div>
              <div class="">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <td>
                          <strong>Sl </strong>
                        </td>
                        <td class="text-center">
                          <strong>Supplier Name </strong>
                        </td>
                        <td class="text-center">
                          <strong>Unit </strong>
                        </td>
                        <td class="text-center">
                          <strong>Category</strong>
                        </td>
                        <td class="text-center">
                          <strong>Product Name</strong>
                        </td>
                        <td class="text-center">
                          <strong>In Qty </strong>
                        </td>
                        <td class="text-center">
                          <strong>Out Qty </strong>
                        </td>
                        <td class="text-center">
                          <strong>Stock </strong>
                        </td>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- foreach ($order->lineItems as $line) or some such thing here --> @foreach($allData as $key => $item) @php $buying_total = App\Models\Purchase::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('buying_qty'); $selling_total = App\Models\InvoiceDetail::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('selling_qty'); @endphp <tr>
                        <td class="text-center"> {{ $key+1}} </td>
                        <td class="text-center"> {{ $item['supplier']['name'] }} </td>
                        <td class="text-center"> {{ $item['unit']['name'] }} </td>
                        <td class="text-center"> {{ $item['category']['name'] }} </td>
                        <td class="text-center"> {{ $item->name }} </td>
                        <td class="text-center"> {{ $buying_total }} </td>
                        <td class="text-center"> {{ $selling_total }} </td>
                        <td class="text-center"> {{ $item->quantity }} </td>
                      </tr> @endforeach
                    </tbody>
                  </table>
                </div> @php $date = new DateTime('now', new DateTimeZone('Asia/Dhaka')); @endphp <i>Printing Time : {{ $date->format('F j, Y, g:i a') }}</i>
                <div class="d-print-none">
                  <div class="float-end">
                    <a href="#" onclick="printDiv()" class="printdiv btn btn-danger waves-effect waves-light ms-2"><i class="lni lni-printer"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end row -->

        <!-- end row -->
      </div>
    </div>
  </div>
  <!-- end col -->
</div>
<!-- end row -->
@endsection()
@push('js')

<script type="text/javascript">
function printDiv() {

  var divName= "printableArea";

   var printContents = document.getElementById(divName).innerHTML;
   var originalContents = document.body.innerHTML;

   document.body.innerHTML = printContents;

   window.print();

   document.body.innerHTML = originalContents;
}
</script>

@endpush()
