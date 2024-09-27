@extends('layouts.app')

@section('title', 'Browse Cars')

@section('content')
    <h1>Available Cars</h1>
    <div class="row">
        @foreach($cars as $car)
            <div class="mb-4 col-md-4">
                <div class="card">
                    <div class="card-header">{{ $car->name }}</div>
                    <img src="/car_images/{{ $car->image }}" alt="{{ $car->name }}" class="img-fluid">
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->brand }} - {{ $car->name }}</h5>
                        <p class="card-text">
                            {{ $car->car_type }}<br>
                            Year: {{ $car->year }}<br>
                            Daily Rent: ${{ $car->daily_rent_price }}
                        </p>
                        <a href="{{ route('cars.show', $car->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
