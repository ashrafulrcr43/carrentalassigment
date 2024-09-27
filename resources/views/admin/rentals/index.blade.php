@extends('layouts.app')

@section('content')
<div class="container mt-4">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


    {{-- <a href="{{ route('admin.rentals.create') }}" class="mb-3 btn btn-primary">Create New Rental</a> --}}

    @section('content')
    <div class="container">
        <h1>Rental Management</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Car</th>
                    <th>User</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Total Cost</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rentals as $rental)
                    <tr>
                        <td>{{ $rental->id }}</td>
                        <td>{{ $rental->car->name }}</td>
                        <td>{{ $rental->user->name }}</td>
                        <td>{{ $rental->start_date }}</td>
                        <td>{{ $rental->end_date }}</td>
                        <td>${{ $rental->total_cost }}</td>
                        <td>
                            <a href="{{ route('admin.rentals.edit', $rental->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.rentals.destroy', $rental->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
