

<table id="example" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <tr>
      <th>Sl</th>
      <th>Name</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datas as $key => $item)
    <tr>
      <td> {{ $key+1}} </td>
      <td> {{ $item->name }} </td>
      <td>
        <div class="col">
          <button type="button" class="btn btn-outline-success btn-sm edit_row" id_val="{{$item->id}}"><i class="fadeIn animated bx bx-message-square-edit"></i></button>
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
