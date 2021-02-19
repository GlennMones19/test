@extends('layouts.app')

@section('content')
<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="Username">Username: <span class="text-danger">*</span></label>
        <input type="text" name="u_username" value="{{ $user->username }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="Lastname">Last Name: <span class="text-danger">*</span></label>
        <input type="text" name="u_lastname" value="{{ $user->lastname }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="Firstname">First Name: <span class="text-danger">*</span></label>
        <input type="text" name="u_firstname" value="{{ $user->firstname }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="Email">Email Address: <span class="text-danger">*</span></label>
        <input type="text" name="u_emailaddress" value="{{ $user->email }}" class="form-control">
    </div>
    <button type="submit" class="btn btn-success float-right">Submit</button>
</form>
@endsection