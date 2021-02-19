@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <button class="btn btn-success float-right mb-2" data-toggle="modal" data-target="#create_user"><i class="fas fa-plus"></i> Add User</button>
    <form action="{{ route('users.search') }}" method="GET">
        <div class="d-flex align-items-center">
            <input type="text" name="user_search" class="form-control" placeholder="Search User..." role="search">
            <button class="btn btn-info">Search</button>
        </div>    
    </form>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th class="align-middle">No.</th>
            <th class="align-middle">Email</th>
            <th class="align-middle">Username</th>
            <th class="align-middle">Last Name</th>
            <th class="align-middle">First Name</th>
            <th class="align-middle">Action</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($users as $user)
       <tr>
            <td class="align-middle">{{ $i++ }}</td>
            <td class="align-middle">{{ $user->email }}</td>
            <td class="align-middle">{{ $user->username }}</td>
            <td class="align-middle">{{ $user->lastname }}</td>
            <td class="align-middle">{{ $user->firstname }}</td>
            <td class="align-middle">
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#change_password">Change Password</button>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary"><i class="fas fa-user-edit"></i></a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
       @endforeach
    </tbody>
</table>
@include('user_management.modal.create_user')
@endsection
