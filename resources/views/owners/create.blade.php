<!-- resources/views/create.blade.php -->

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
        
        <h1>Add New Owner</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('owners.store') }}" method="POST">
            @csrf
            <div>
                <label for="name" class="label-text">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="last_name" class="label-text">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div>
                <label for="email" class="label-text">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit" class="btn-primary">Add Owner</button> <!-- Apply style from style.css -->
        </form>
    </div>
@endsection
