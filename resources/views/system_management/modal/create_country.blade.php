<div class="modal" id="create_country">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Country</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
            <form action="{{ route('country.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="Country Code">Country Code: <span class="text-danger">*</span></label>
                    <input type="text" name="c_country_code" class="form-control">
                </div>
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