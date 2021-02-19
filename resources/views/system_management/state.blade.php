@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between">
    <button class="btn btn-success float-right mb-2" data-toggle="modal" data-target="#create_state"><i class="fas fa-plus"></i> Add State</button>
    <form action="{{ route('state.search') }}" method="GET">
        <div class="d-flex align-items-center">
            <input type="text" name="state_search" class="form-control" placeholder="Search State..." role="search">
            <button class="btn btn-info">Search</button>
        </div>    
    </form>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th class="align-middle">No.</th>
            <th class="align-middle">State ID</th>
            <th class="align-middle">Name</th>
            <th class="align-middle">Action</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($states as $state)
       <tr>
            <td class="align-middle">{{ $i++ }}</td>
            <td class="align-middle">{{ $state->country->name }}</td>
            <td class="align-middle">{{ $state->name }}</td>
            <td class="align-middle">
                <form action="{{ route('state.destroy', $state->id) }}" method="POST">
                    <a href="{{ route('state.edit', $state->id) }}" class="btn btn-primary"><i class="fas fa-user-edit"></i></a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
       @endforeach
    </tbody>
</table>
@include('system_management.modal.create_state')
@endsection