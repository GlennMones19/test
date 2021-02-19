@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between">
    <button class="btn btn-success float-right mb-2" data-toggle="modal" data-target="#create_department"><i class="fas fa-plus"></i> Add Department</button>
    <form action="{{ route('department.search') }}" method="GET">
        <div class="d-flex align-items-center">
            <input type="text" name="department_search" class="form-control" placeholder="Search Department..." role="search">
            <button class="btn btn-info">Search</button>
        </div>    
    </form>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th class="align-middle">No.</th>
            <th class="align-middle">Department Name</th>
            <th class="align-middle">Action</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($departments as $department)
       <tr>
            <td class="align-middle">{{ $i++ }}</td>
            <td class="align-middle">{{ $department->name }}</td>
            <td class="align-middle">
                <form action="{{ route('department.destroy', $department->id) }}" method="POST">
                    <a href="{{ route('department.edit', $department->id) }}" class="btn btn-primary"><i class="fas fa-user-edit"></i></a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
       @endforeach
    </tbody>
</table>
@include('system_management.modal.create_department')
@endsection