<!-- resources/views/vehicles/index.blade.php -->

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
        <h1>Vehicles List</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>License Plate</th>
                    <th>Year</th>
                    <th>Price</th>
                    <th>Owner</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->id }}</td>
                        <td>{{ $vehicle->brand }}</td>
                        <td>{{ $vehicle->model }}</td>
                        <td>{{ $vehicle->license_plate }}</td>
                        <td>{{ $vehicle->year }}</td>
                        <td>${{ number_format($vehicle->price, 2) }}</td>
                        <td>
                            @if ($vehicle->user_id && $vehicle->owner)
                                {{ $vehicle->owner->name }} {{ $vehicle->owner->last_name }}
                            @else
                                No Owner  {{ $vehicle->user_id }}
                            @endif
                        </td>
                        <td class="actions">
                            <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Add Vehicle</a>
    </div>
@endsection
