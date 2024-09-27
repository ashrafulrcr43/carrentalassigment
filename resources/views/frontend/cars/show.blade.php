@extends('layouts.app')

@section('title', $car->name)

@section('content')
    <h1>{{ $car->brand }} - {{ $car->name }}</h1>
    <div class="row">
        <div class="col-md-6">
            <img src="/car_images/{{ $car->image }}" alt="{{ $car->name }}" class="img-fluid">
        </div>
        <div class="col-md-3">
            <ul>
                <li >Type: {{ $car->car_type }}</li>
                <li>Year: {{ $car->year }}</li>
                <li>Daily Rent: ${{ $car->daily_rent_price }}</li>
            </ul>
            <a href="{{ route('admin.rentals.create', $car->id) }}" class="btn btn-primary">Book Now</a>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection
