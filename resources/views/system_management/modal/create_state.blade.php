<div class="modal" id="create_state">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add State</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
            <form action="{{ route('state.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="Name">Name: <span class="text-danger">*</span></label>
                    <input type="text" name="c_name" class="form-control">
                </div>
                <button type="submit" class="btn btn-success float-right">Submit</button>
            </form>
        </div>
      </div>
    </div>
</div>