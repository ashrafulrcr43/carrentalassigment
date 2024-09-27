@extends('layouts.app')

@section('title', 'Book ' . $car->name)

@section('content')
    <h1>Book {{ $car->brand }} - {{ $car->name }}</h1>

    <form action="{{ route('admin.rentals.store', $car->id) }}" method="POST">
        @csrf
        <input type="hidden" name="car_id" value="{{ $car->id }}">
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" required class="form-control">
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" required class="form-control">
        </div>
         <a href="{{ route('admin.rentals.create', $car->id) }}" class="btn btn-primary">Book Now</a>

    </form>
    
@endsection
