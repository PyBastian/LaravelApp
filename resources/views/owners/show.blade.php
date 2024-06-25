<!-- resources/views/owners/show.blade.php -->

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
        <h1>Owner Detailss</h1>

        <!-- <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $owner->name }} {{ $owner->last_name }}</h5>
                <p class="card-text">Email: {{ $owner->email }}</p>
                <p class="card-text">Created at: {{ $owner->created_at }}</p>
                <p class="card-text" >Updated at: {{ $owner->updated_at }}</p>
            </div>
        </div> -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title label-text">{{ $owner->name }} {{ $owner->last_name }}</h5>
                <p class="card-text label-text">Email: {{ $owner->email }}</p>
                <p class="card-text label-text">Created at: {{ $owner->created_at }}</p>
                <p class="card-text label-text">Updated at: {{ $owner->updated_at }}</p>
            </div>
        </div>
        <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-primary mt-3">Edit Owner</a>
    </div>
@endsection
