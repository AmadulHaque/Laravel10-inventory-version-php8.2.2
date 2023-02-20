<div class="row">
  <div class="col-12">
    <div class="row">
      <div class="col-6 mt-4">
        <address>
          <strong>Easy Shopping Mall:</strong>
          <br> Purana Palton Dhaka <br> support@easylearningbd.com
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
                <td>
                  <strong>Sl </strong>
                </td>
                <td class="text-center">
                  <strong>Customer Name </strong>
                </td>
                <td class="text-center">
                  <strong>Invoice No </strong>
                </td>
                <td class="text-center">
                  <strong>Date</strong>
                </td>
                <td class="text-center">
                  <strong>Description</strong>
                </td>
                <td class="text-center">
                  <strong>Amount </strong>
                </td>
              </tr>
            </thead>
            <tbody>
              <!-- foreach ($order->lineItems as $line) or some such thing here --> @php $total_sum = '0'; @endphp @foreach($allData as $key => $item) <tr>
                <td class="text-center">{{ $key+1 }}</td>
                <td class="text-center">{{ $item['payment']['customer']['name'] }}</td>
                <td class="text-center">#{{ $item->invoice_no }}</td>
                <td class="text-center">{{ date('d-m-Y',strtotime($item->date)) }}</td>
                <td class="text-center">{{ $item->description }}</td>
                <td class="text-center">{{ $item['payment']['total_amount'] }}</td>
              </tr> @php $total_sum += $item['payment']['total_amount']; @endphp @endforeach <tr>
                <td class="no-line"></td>
                <td class="no-line"></td>
                <td class="no-line"></td>
                <td class="no-line"></td>
                <td class="no-line text-center">
                  <strong>Grand Amount</strong>
                </td>
                <td class="no-line text-end">
                  <h4 class="m-0">${{ $total_sum}}</h4>
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
