

<table id="example" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <tr>
      <th>Sl</th>
       <th>Customer Name</th>
       <th>Invoice No </th>
       <th>Date</th>
       <th>Due Amount</th>
       <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datas as $key => $item)
    <tr>
      <td> {{ $key+1}} </td>
      <td> {{ $item['customer']['name'] }} </td>
      <td> #{{ $item['invoice']['invoice_no'] }} </td>
      <td> {{ date('d-m-Y',strtotime($item['invoice']['date'])) }} </td>
      <td> {{ $item->due_amount }} </td>
      <td>
        <a href="{{ route('customer.edit.invoice',$item->invoice_id) }}" class="btn btn-primary btn-sm" title="Edit Data">  <i class="fadeIn animated bx bx-message-square-edit"></i>  </a>
        <a href="{{ route('customer.invoice.details.pdf',$item->invoice_id) }}" target="_blank" class="btn btn-danger btn-sm" title="Customer Invoice Details"> <i class="lni lni-eye"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@if(count($datas) == 0)
   <tr><p class="text-center p-5">No Data Found</p></tr>
@endif


<?php $paginate = $datas ?>
@include( 'backend.partials.pagination')
