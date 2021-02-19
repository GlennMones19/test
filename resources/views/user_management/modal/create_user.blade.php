<div class="modal" id="create_user">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="Username">Username: <span class="text-danger">*</span></label>
                    <input type="text" name="c_username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Lastname">Last Name: <span class="text-danger">*</span></label>
                    <input type="text" name="c_lastname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Firstname">First Name: <span class="text-danger">*</span></label>
                    <input type="text" name="c_firstname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Email">Email Address: <span class="text-danger">*</span></label>
                    <input type="text" name="c_emailaddress" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Password">Password: <span class="text-danger">*</span></label>
                    <input type="password" name="c_password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success float-right">Submit</button>
            </form>
        </div>
      </div>
    </div>
</div>