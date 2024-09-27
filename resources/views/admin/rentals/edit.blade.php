@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Rental</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.rentals.update', $rental->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="car_id" class="form-label">Select Car</label>
            <select class="form-control" id="car_id" name="car_id">
                @foreach($cars as $car)
                    <option value="{{ $car->id }}" {{ $rental->car_id == $car->id ? 'selected' : '' }}>
                        {{ $car->make }} {{ $car->model }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $rental->start_date }}" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $rental->end_date }}" required>
        </div>

        <div class="mb-3">
            <label for="total_cost" class="form-label">Total Cost</label>
            <input type="number" class="form-control" id="total_cost" name="total_cost" value="{{ $rental->total_cost }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Rental</button>
    </form>
</div>
@endsection
