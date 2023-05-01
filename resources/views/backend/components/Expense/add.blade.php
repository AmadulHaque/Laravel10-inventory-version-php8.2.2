<!-- Modal -->
<div class="modal fade" id="addExpenseTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Expense</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" id="addExpenseTypeStore">
          @csrf
          <div class="modal-body">
              <div class="row mb-3">
                <label for="example-text-input" class="col-12 col-form-label">Type Name </label>
                <div class="form-group col-12">
                  <select name="typeId" class="form-control"  id="">
                    <option value="" selected disabled>Choose..</option>
                    @foreach ($ExpenseType as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <!-- end row -->
              <div class="row mb-3">
                <label for="example-text-input" class="col-12 col-form-label">Amount</label>
                <div class="form-group col-12">
                  <input name="amount" class="form-control" type="text">
                </div>
              </div>
              <div class="row mb-3">
                <label for="example-text-input" class="col-12 col-form-label">Note</label>
                <div class="form-group col-12">
                  <input name="note" class="form-control" type="text">
                </div>
              </div>
              <div class="row mb-3">
                <label for="example-text-input" class="col-12 col-form-label">Date</label>
                <div class="form-group col-12">
                  <input name="date" class="form-control" type="date">
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Expense</button>
          </div>
      </form>
    </div>
  </div>
</div>
