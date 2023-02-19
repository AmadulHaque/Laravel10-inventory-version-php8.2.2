

<table id="example" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <tr>
      <th>Sl</th>
      <th>Customer Name</th>
      <th>Invoice No </th>
      <th>Date </th>
      <th>Desctipion</th>
      <th>Amount</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datas as $key => $item)
    <tr>
        <td> {{ $key+1}} </td>
        <td> {{ $item['payment']['customer']['name'] }} </td>
        <td> #{{ $item->invoice_no }} </td>
        <td> {{ date('d-m-Y',strtotime($item->date))  }} </td>
        <td>  {{ $item->description }} </td>
        <td>  $ {{ $item['payment']['total_amount'] }} </td>
    </tr>
    @endforeach
  </tbody>
</table>
@if(count($datas) == 0)
   <tr><p class="text-center p-5">No Data Found</p></tr>
@endif


<?php $paginate = $datas ?>
@include( 'backend.partials.pagination')
