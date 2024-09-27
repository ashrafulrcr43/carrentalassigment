@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Car</h1>

    <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Car Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $car->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand', $car->brand) }}" required>
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ old('model', $car->model) }}" required>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ old('year', $car->year) }}" required>
        </div>

        <div class="mb-3">
            <label for="car_type" class="form-label">Car Type</label>
            <input type="text" class="form-control" id="car_type" name="car_type" value="{{ old('car_type', $car->car_type) }}" required>
        </div>

        <div class="mb-3">
            <label for="daily_rent_price" class="form-label">Daily Rent Price</label>
            <input type="number" class="form-control" id="daily_rent_price" name="daily_rent_price" step="0.01" value="{{ old('daily_rent_price', $car->daily_rent_price) }}" required>
        </div>

        <div class="mb-3">
            <label for="availability" class="form-label">Availability</label>
            <select name="availability" id="availability" class="form-control" required>
                <option value="1" {{ $car->availability ? 'selected' : '' }}>Available</option>
                <option value="0" {{ !$car->availability ? 'selected' : '' }}>Not Available</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Car Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            @if($car->image)
            <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="mt-2 img-thumbnail" width="150">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update Car</button>
    </form>
</div>
@endsection
