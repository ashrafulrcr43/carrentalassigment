@extends('layouts.app')

@section('title', $car ? 'Edit Car' : 'Add New Car')

@section('content')
    <h1>{{ $car ? 'Edit Car' : 'Add New Car' }}</h1>

    <form action="{{ $car ? route('admin.cars.update', $car->id) : route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($car) @method('PUT') @endif

        <div class="mb-3">
            <label for="name" class="form-label">Car Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $car->name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand', $car->brand ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ old('model', $car->model ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ old('year', $car->year ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="car_type" class="form-label">Car Type</label>
            <input type="text" class="form-control" id="car_type" name="car_type" value="{{ old('car_type', $car->car_type ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="daily_rent_price" class="form-label">Daily Rent Price</label>
            <input type="number" class="form-control" id="daily_rent_price" name="daily_rent_price" value="{{ old('daily_rent_price', $car->daily_rent_price ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="availability" class="form-label">Availability</label>
            <select class="form-control" id="availability" name="availability" required>
                <option value="1" {{ old('availability', $car->availability ?? '1') == '1' ? 'selected' : '' }}>Available</option>
                <option value="0" {{ old('availability', $car->availability ?? '1') == '0' ? 'selected' : '' }}>Not Available</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Car Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">{{ $car ? 'Update Car' : 'Add Car' }}</button>
    </form>
@endsection
