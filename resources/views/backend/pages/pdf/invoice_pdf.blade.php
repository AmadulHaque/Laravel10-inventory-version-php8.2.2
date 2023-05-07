@extends('backend.master')
@section('content')
@php
$setting =DB::table('settings')->first();
@endphp
<div  class=" row">
  <div class="col-12">
    <div id="printableArea" class="card">
      <div  class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="invoice-title">
              <h4 class="float-end font-size-16">
                <strong>Invoice No # {{ $invoice->invoice_no }}</strong>
              </h4>
              <h3>
                <img src="{{(!empty($setting->logo)) ? url('images/setting/'.$setting->logo):url('images/profile/no_image.jpeg') }}" alt="logo" height="24" />
              </h3>
            </div>
            <hr>
            <div class="row">
              <div class="col-6 mt-4">
                    <address>
                      <strong>{{$setting->shop_title}} Shopping Mall:</strong>
                      <br>{{$setting->address}}<br> {{$setting->email}}
                    </address>
              </div>
              <div class="col-6 mt-4 text-end">
                <address>
                  <strong>Invoice Date:</strong>
                  <br>
                  {{ date('d-m-Y',strtotime($invoice->date)) }}
                  <br>
                  <br>
                </address>
              </div>
            </div>
          </div>
        </div> @php $payment = App\Models\Payment::where('invoice_id',$invoice->id)->first(); @endphp <div class="row">
          <div class="col-12">
            <div>
              <div class="p-2">
                <h3 class="font-size-16">
                  <strong>Customer Invoice</strong>
                </h3>
              </div>
              <div class="">
                <div class="table-responsive">
                  <table class="table  table-striped table-bordered ">
                    <thead>
                      <tr>
                        <td>
                          <strong>Customer Name </strong>
                        </td>
                        <td class="text-center">
                          <strong>Customer Mobile</strong>
                        </td>
                        <td class="text-center">
                          <strong>Address</strong>
                        </td>
                        <td class="text-center">
                          <strong>Description</strong>
                        </td>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- foreach ($order->lineItems as $line) or some such thing here -->
                      <tr>
                        <td> {{ $payment['customer']['name'] }}</td>
                        <td class="text-center">{{ $payment['customer']['mobile_no']  }}</td>
                        <td class="text-center">{{ $payment['customer']['email']  }}</td>
                        <td class="text-center">{{ $invoice->description  }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end row -->
        <div class="row">
          <div class="col-12">
            <div>
              <div class="p-2"></div>
              <div class="">
                <div class="">
                  <table class="table table-condensed table-striped table-bordered ">
                    <thead>
                      <tr>
                        <td>
                          <strong>Sl </strong>
                        </td>
                        <td class="text-center">
                          <strong>Category</strong>
                        </td>
                        <td class="text-center">
                          <strong>Product Name</strong>
                        </td>
                        <td class="text-center">
                          <strong>Current Stock</strong>
                        </td>
                        <td class="text-center">
                          <strong>Quantity</strong>
                        </td>
                        <td class="text-center">
                          <strong>Unit Price </strong>
                        </td>
                        <td class="text-center">
                          <strong>Total Price</strong>
                        </td>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- foreach ($order->lineItems as $line) or some such thing here --> @php $total_sum = '0'; @endphp @foreach($invoice['invoice_details'] as $key => $details) <tr>
                        <td class="text-center">{{ $key+1 }}</td>
                        <td class="text-center">{{ $details['category']['name'] }}</td>
                        <td class="text-center">{{ $details['product']['name'] }}</td>
                        <td class="text-center">{{ $details['product']['quantity'] }}</td>
                        <td class="text-center">{{ $details->selling_qty }}</td>
                        <td class="text-center">{{ $details->unit_price }}</td>
                        <td class="text-center">{{ $details->selling_price }}</td>
                      </tr> @php $total_sum += $details->selling_price; @endphp @endforeach <tr>
                        <td class="thick-line"></td>
                        <td class="thick-line"></td>
                        <td class="thick-line"></td>
                        <td class="thick-line"></td>
                        <td class="thick-line"></td>
                        <td class="thick-line text-center">
                          <strong>Subtotal</strong>
                        </td>
                        <td class="thick-line text-end">${{ $total_sum }}</td>
                      </tr>
                      <tr>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line text-center">
                          <strong>Discount Amount</strong>
                        </td>
                        <td class="no-line text-end">${{ $payment->discount_amount }}</td>
                      </tr>
                      <tr>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line text-center">
                          <strong>Paid Amount</strong>
                        </td>
                        <td class="no-line text-end">${{ $payment->paid_amount }}</td>
                      </tr>
                      <tr>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line text-center">
                          <strong>Due Amount</strong>
                        </td>
                        <td class="no-line text-end">${{ $payment->due_amount }}</td>
                      </tr>
                      <tr>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line text-center">
                          <strong>Grand Amount</strong>
                        </td>
                        <td class="no-line text-end">
                          <h4 class="m-0">${{ $payment->total_amount }}</h4>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
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
