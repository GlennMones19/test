@extends('layouts.app')

@section('content')
<form action="{{ route('country.update', $country->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="Country Code">Country Code: <span class="text-danger">*</span></label>
        <input type="text" name="u_country_code" value="{{ $country->country_code }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="Name">Name: <span class="text-danger">*</span></label>
        <input type="text" name="u_name" value="{{ $country->name }}" class="form-control">
    </div>
    <button type="submit" class="btn btn-success float-right">Submit</button>
</form>
@endsection