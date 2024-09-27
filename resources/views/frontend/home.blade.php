@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="text-center jumbotron">
        <h1 class="display-4">Welcome to Car Rental Service</h1>
        <p class="lead">Browse our fleet of vehicles and book the perfect car for your next trip.</p>
    </div>

    <!-- Search Filters Section -->
    <form action="{{ route('home') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="car_type" class="mb-3">Car Type</label>
                <select name="car_type" id="car_type" class="form-control">
                    <option value="">All</option>
                    @foreach($carTypes as $type)
                        <option value="{{ $type }}" {{ request('car_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label for="brand" class="mb-3">Brand</label>
                <select name="brand" id="brand" class="form-control">
                    <option value="">All</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>{{ $brand }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label for="max_price" class="mb-3">Max Daily Rent Price ($)</label>
                <input type="number" name="max_price" id="max_price" class="form-control" value="{{ request('max_price') }}">
            </div>

            <div class="col-md-3 align-self-end">
                <button type="submit" class="btn btn-primary w-100">Filter Cars</button>
            </div>
        </div>
    </form>

    <!-- Available Cars Section -->
    <h2 class="mt-4">Available Cars</h2>
    <div class="row">
        @if($cars->count() > 0)
            @foreach($cars as $car)
                <div class="mb-4 col-md-4">
                    <div class="card h-100">
                        <img src="/car_images/{{ $car->image }}" class="card-img-top" alt="{{ $car->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->brand }} - {{ $car->name }}</h5>
                            <p class="card-text">
                                Car Type: {{ $car->car_type }}<br>
                                Year: {{ $car->year }}<br>
                                Daily Rent: ${{ $car->daily_rent_price }}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('cars.show', $car->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12">
                <p class="text-center">No cars available for the selected filters.</p>
            </div>
        @endif
    </div>
</div>
@endsection
