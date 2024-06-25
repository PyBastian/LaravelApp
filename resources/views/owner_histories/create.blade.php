<!-- resources/views/owner_histories/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Owner History</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('owner_histories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="vehicle_id" class="label-text">Vehicle:</label>
                <select id="vehicle_id" name="vehicle_id" class="form-control" required>
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}">{{ $vehicle->brand }} {{ $vehicle->model }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="owner_id">Owner:</label>
                <select id="owner_id" name="owner_id" class="form-control" required>
                    @foreach($owners as $owner)
                        <option value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Owner History</button>
        </form>
    </div>
@endsection
