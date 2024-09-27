@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Add New Car</h1>

    <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Car Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand') }}" required>
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}" required>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ old('year') }}" required>
        </div>

        <div class="mb-3">
            <label for="car_type" class="form-label">Car Type</label>
            <input type="text" class="form-control" id="car_type" name="car_type" value="{{ old('car_type') }}" required>
        </div>

        <div class="mb-3">
            <label for="daily_rent_price" class="form-label">Daily Rent Price</label>
            <input type="number" class="form-control" id="daily_rent_price" name="daily_rent_price" step="0.01" value="{{ old('daily_rent_price') }}" required>
        </div>

        <div class="mb-3">
            <label for="availability" class="form-label">Availability</label>
            <select name="availability" id="availability" class="form-control" required>
                <option value="1">Available</option>
                <option value="0">Not Available</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Car Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>

        <button type="submit" class="pt-2 pb-2 pl-5 pr-5 mb-5 btn btn-success">Add Car</button>
    </form>
</div>
@endsection
