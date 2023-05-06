@php
$setting =DB::table('settings')->first();
@endph
<div class="row">
  <div class="col-12">
    <div class="card">
      <div id="printableArea" class="card-body">

        <div class="row">
          <div class="col-12">
            <div class="invoice-title">
              <h3>
                 <img src="{{(!empty($setting->logo)) ? url('images/setting/'.$setting->logo):url('images/profile/no_image.jpeg') }}" class="logo-icon" height="24" alt="logo icon">
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
                <address></address>
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
                          <strong>Customer Name </strong>
                        </td>
                        <td class="text-center">
                          <strong>Invoice No </strong>
                        </td>
                        <td class="text-center">
                          <strong>Date</strong>
                        </td>
                        <td class="text-center">
                          <strong>Due Amount </strong>
                        </td>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- foreach ($order->lineItems as $line) or some such thing here --> @php $total_due = '0'; @endphp @foreach($allData as $key => $item) <tr>
                        <td class="text-center"> {{ $key+1}} </td>
                        <td class="text-center"> {{ $item['customer']['name'] }} </td>
                        <td class="text-center"> #{{ $item['invoice']['invoice_no'] }} </td>
                        <td class="text-center"> {{ date('d-m-Y',strtotime($item['invoice']['date'])) }} </td>
                        <td class="text-center"> {{ $item->due_amount }} </td>
                      </tr> @php $total_due += $item->due_amount; @endphp @endforeach <tr>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line text-center">
                          <strong>Grand Due Amount</strong>
                        </td>
                        <td class="no-line text-end">
                          <h4 class="m-0">${{ $total_due}}</h4>
                        </td>
                      </tr>
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
      </div>
    </div>
  </div>
</div>

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