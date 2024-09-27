@extends('layouts.app')

@section('title', 'Manage Cars')

@section('content')
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h1>Manage Cars</h1>
        <a href="{{ route('admin.cars.create') }}" class="btn btn-success">Add New Car</a>

    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Type</th>
                <th>Daily Rent</th>
                <th>Availability</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->year }}</td>
                    <td>{{ $car->car_type }}</td>
                    <td>{{ $car->daily_rent_price }}</td>
                    <td>{{ $car->availability ? 'Available' : 'Not Available' }}</td>
                    <td>
                        <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
