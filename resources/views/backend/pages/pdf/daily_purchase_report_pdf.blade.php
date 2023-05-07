@php
$setting =DB::table('settings')->first();
@endphp
<div class="row">
  <div class="col-12">
    <div class="row">
      <div class="col-6 mt-4">
        <address>
          <strong>{{$setting->shop_title}} Shopping Mall:</strong>
          <br>{{$setting->address}}<br> {{$setting->email}}
        </address>
      </div>
      <div class="col-6 mt-4 text-end">
        <address></address>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div>
      <div class="p-2">
        <h3 class="font-size-16">
          <strong>Daily Invoice Report <span class="btn btn-info"> {{ date('d-m-Y',strtotime($start_date)) }} </span> - <span class="btn btn-success"> {{ date('d-m-Y',strtotime($end_date)) }} </span>
          </strong>
        </h3>
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
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                   <td><strong>Sl </strong></td>
                   <td class="text-center"><strong>Purchase No </strong></td>
                   <td class="text-center"><strong>Date  </strong>   </td>
                   <td class="text-center"><strong>Product Name</strong> </td>
                   <td class="text-center"><strong>Quantity</strong>   </td>
                   <td class="text-center"><strong>Unit Price  </strong>   </td>
                   <td class="text-center"><strong>Total Price  </strong></td>
              </tr>
            </thead>
            <tbody>
              <!-- foreach ($order->lineItems as $line) or some such thing here -->
              @php $total_sum = '0'; @endphp
               @foreach($allData as $key => $item)
               <tr>
                   <td class="text-center">{{ $key+1 }}</td>
                    <td class="text-center">{{ $item->purchase_no }}</td>
                    <td class="text-center">{{ date('d-m-Y',strtotime($item->date)) }}</td>
                    <td class="text-center">{{ $item['product']['name'] }}</td>
                    <td class="text-center">{{ $item->buying_qty }} {{ $item['product']['unit']['name'] }} </td>
                    <td class="text-center">{{ $item->unit_price }}</td>
                    <td class="text-center">{{ $item->buying_price }}</td>
                </tr>
             @php
            $total_sum += $item->buying_price;
            @endphp
            @endforeach
            <tr>
                <td class="no-line"></td>
                <td class="no-line"></td>
                <td class="no-line"></td>
                <td class="no-line"></td>
                <td class="no-line text-center"><strong>Grand Amount</strong></td>
                <td class="no-line text-end"><h4 class="m-0">${{ $total_sum}}</h4></td>
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
