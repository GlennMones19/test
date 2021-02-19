@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between">
    <button class="btn btn-success float-right mb-2" data-toggle="modal" data-target="#create_country"><i class="fas fa-plus"></i> Add Country</button>
    <form action="{{ route('country.search') }}" method="GET">
        <div class="d-flex align-items-center">
            <input type="text" name="country_search" class="form-control" placeholder="Search Country..." role="search">
            <button class="btn btn-info">Search</button>
        </div>    
    </form>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th class="align-middle">No.</th>
            <th class="align-middle">Country Code</th>
            <th class="align-middle">Country Name</th>
            <th class="align-middle">Action</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($countries as $country)
       <tr>
            <td class="align-middle">{{ $i++ }}</td>
            <td class="align-middle">{{ $country->country_code }}</td>
            <td class="align-middle">{{ $country->name }}</td>
            <td class="align-middle">
                <form action="{{ route('country.destroy', $country->id) }}" method="POST">
                    <a href="{{ route('country.edit', $country->id) }}" class="btn btn-primary"><i class="fas fa-user-edit"></i></a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
       @endforeach
    </tbody>
</table>
@include('system_management.modal.create_country')
@endsection