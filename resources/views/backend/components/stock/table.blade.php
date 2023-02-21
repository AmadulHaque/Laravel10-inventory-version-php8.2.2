

<table id="example" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <tr>
        <th>Sl</th>
        <th>Supplier Name </th>
        <th>Unit</th>
        <th>Category</th> 
        <th>Product Name</th> 
        <th>In Qty</th> 
        <th>Out Qty </th>  
        <th>Stock </th>
    </tr>
  </thead>
  <tbody>
    @foreach($datas as $key => $item)
    @php
        $buying_total = App\Models\Purchase::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('buying_qty');
        $selling_total = App\Models\InvoiceDetail::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('selling_qty');
    @endphp
    <tr>
      <td> {{ $key+1}} </td> 
        <td> {{ $item['supplier']['name'] }} </td> 
        <td> {{ $item['unit']['name'] }} </td> 
        <td> {{ $item['category']['name'] }} </td> 
        <td> {{ $item->name }} </td> 
        <td> <span class="btn btn-success"> {{ $buying_total  }}</span>  </td> 
        <td> <span class="btn btn-info"> {{ $selling_total  }}</span> </td> 
        <td> <span class="btn btn-danger"> {{ $item->quantity }}</span> </td> 
    </tr>
    @endforeach
  </tbody>
</table>
@if(count($datas) == 0)
   <tr><p class="text-center p-5">No Data Found</p></tr>
@endif


<?php $paginate = $datas ?>
@include( 'backend.partials.pagination')
