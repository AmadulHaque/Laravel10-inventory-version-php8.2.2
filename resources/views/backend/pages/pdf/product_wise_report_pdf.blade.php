
  <!-- end page title -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div id="printableArea" class="card-body">
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
                <div class="p-2"></div>
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
                    <table class="table">
                      <thead>
                        <tr>
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
                            <strong>Stock </strong>
                          </td>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                        <tr>
                          <td class="text-center"> {{ $product['supplier']['name'] }} </td>
                          <td class="text-center"> {{ $product['unit']['name'] }} </td>
                          <td class="text-center"> {{ $product['category']['name'] }} </td>
                          <td class="text-center"> {{ $product->name }} </td>
                          <td class="text-center"> {{ $product->quantity }} </td>
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
