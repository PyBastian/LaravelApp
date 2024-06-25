<!-- resources/views/owners/index.blade.php -->

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
        <h1>Owners List</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($owners as $owner)
                    <tr>
                        <td>{{ $owner->id }}</td>
                        <td>{{ $owner->name }}</td>
                        <td>{{ $owner->last_name }}</td>
                        <td>{{ $owner->email }}</td>
                        <td class="actions">
                            <a href="{{ route('owners.show', $owner->id) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('owners.destroy', $owner->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this owner?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('owners.create') }}" class="btn btn-primary">Add Owner</a>
    </div>
@endsection
