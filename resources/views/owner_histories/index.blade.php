<!-- resources/views/owner_histories/index.blade.php -->

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
        <h1>Owner Histories</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>license_plate</th>
                    <th>Vehicle model</th>
                    <th>Owner email</th>
                    <th>Vehicle ID</th>
                    <th>ownerID</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ownerHistories as $ownerHistory)
                    <tr>
                        <td>{{ $ownerHistory->id }}</td>
                        <td>{{ $ownerHistory->vehicle->license_plate }}</td>
                        <td>{{ $ownerHistory->vehicle->model }}</td>
                        <td>{{ $ownerHistory->owner->email }}</td>
                        <td>{{ $ownerHistory->vehicle_id }}</td>
                        <td>{{ $ownerHistory->owner_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
