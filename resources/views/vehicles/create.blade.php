@extends('layouts.app')

@section('content')
<div class="navbar">
        <a href="{{ route('owners.index') }}" class="btn btn-primary">View Owners</a>
        <a href="{{ route('vehicles.index') }}" class="btn btn-primary">View Vehicles</a>
        <a href="{{ route('owners.create') }}" class="btn btn-primary">Add Owner</a>
        <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Add Vehicle</a>
        <a href="{{ route('owner_histories.index') }}" class="btn btn-primary">Vehicles Owner History</a>
</div>
<div class="container">
    <h1>Create Vehicle</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vehicles.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="brand" class="label-text">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand') }}" required>
        </div>

        <div class="form-group">
            <label for="model" class="label-text">Model</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}" required>
        </div>

        <div class="form-group">
            <label for="license_plate" class="label-text">License Plate</label>
            <input type="text" class="form-control" id="license_plate" name="license_plate" value="{{ old('license_plate') }}" required>
        </div>

        <div class="form-group">
            <label for="year" class="label-text">Year</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ old('year') }}" required>
        </div>

        <div class="form-group">
            <label for="price" class="label-text">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
        </div>

        <div class="form-group">
            <label for="user_id" class="label-text">Owner</label>
            <select class="form-control" id="user_id" name="user_id" required>
                @foreach ($owners as $owner)
                    <option value="{{ $owner->id }}" >
                        {{ $owner->name }} {{ $owner->last_name }} {{ $owner->email }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Vehicle</button>
    </form>
</div>
@endsection