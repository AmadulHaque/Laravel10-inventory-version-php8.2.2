

<table id="example" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <tr>
      <th>Sl</th>
      <th>Purhase No</th>
      <th>Date </th>
      <th>Supplier</th>
      <th>Category</th>
      <th>Qty</th>
      <th>Product Name</th>
      <th>Product Image</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datas as $key => $item)
    <tr>
        <td> {{ $key+1}} </td>
        <td> {{ $item->purchase_no }} </td>
        <td> {{ date('d-m-Y',strtotime($item->date))  }} </td>
        <td> {{ $item['supplier']['name'] }} </td>
        <td> {{ $item['category']['name'] }} </td>
        <td> {{ $item->buying_qty }} </td>
        <td> {{ $item['product']['name'] }} </td>
        <td> <img src="{{ asset( $item->image ) }}" style="width:60px; height:50px"></td>
        <td>
          @if($item->status == '0')<span class="btn btn-warning">Pending</span>
          @elseif($item->status == '1')<span class="btn btn-success">Approved</span>@endif
        </td>
        <td>
          <div class="col">
            <button type="button" class="btn btn-outline-danger btn-sm delete_row" id_val="{{$item->id}}" ><i class="lni lni-trash"></i></button>
          </div>
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
