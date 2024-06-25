<!-- resources/views/owners/edit.blade.php -->

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
        <h1>Edit Owner</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('owners.update', $owner->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name"  class="label-text">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $owner->name }}" required>
            </div>

            <div class="form-group">
                <label for="last_name" class="label-text">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $owner->last_name }}" required>
            </div>

            <div class="form-group">
                <label for="email" class="label-text">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $owner->email }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Owner</button>
        </form>
    </div>
@endsection
