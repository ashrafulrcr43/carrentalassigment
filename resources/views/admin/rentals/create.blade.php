@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Rental</h1>
    <form action="{{ route('admin.rentals.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="car_id" class="m-2 form-label"> Select Car Form Listing  </label>
            <select name="car_id" id="car_id" class="form-control w-50" required>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->name }} ({{ $car->brand }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="p-3 form-control w-50" id="start_date" name="start_date" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control w-50" id="end_date" name="end_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Booking Rental</button>
    </form>
</div>
@endsection
