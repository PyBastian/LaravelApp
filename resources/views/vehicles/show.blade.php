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
    <h1>Vehicle Details</h1>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $vehicle->id }}</td>
        </tr>
        <tr>
            <th>Brand</th>
            <td>{{ $vehicle->marca }}</td>
        </tr>
        <tr>
            <th>Model</th>
            <td>{{ $vehicle->modelo }}</td>
        </tr>
        <tr>
            <th>License Plate</th>
            <td>{{ $vehicle->patente }}</td>
        </tr>
        <tr>
            <th>Year</th>
            <td>{{ $vehicle->año }}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{ $vehicle->precio }}</td>
        </tr>
        <tr>
            <th>Owner</th>
            <td>{{ $vehicle->owner->name }} {{ $vehicle->owner->last_name }}</td>
        </tr>
    </table>

    <a href="{{ route('vehicles.index') }}" class="btn btn-primary">Back to List</a>
</div>
@endsection
