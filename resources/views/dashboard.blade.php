@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="flex-wrap pt-3 pb-2 mb-3 d-flex justify-content-between flex-md-nowrap align-items-center border-bottom">
        <h1 class="h2">Admin Dashboard</h1>
    </div>

    <div class="row">
        <!-- Total Cars -->
        <div class="col-md-4">
            <div class="mb-3 text-white card bg-primary">
                <div class="card-header">Total Cars</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalCars }}</h5>
                    <p class="card-text">Total number of cars in the system.</p>
                </div>
            </div>
        </div>

        <!-- Available Cars -->
        <div class="col-md-4">
            <div class="mb-3 text-white card bg-success">
                <div class="card-header">Available Cars</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $availableCars }}</h5>
                    <p class="card-text">Number of cars currently available for rent.</p>
                </div>
            </div>
        </div>

        <!-- Total Rentals -->
        <div class="col-md-4">
            <div class="mb-3 text-white card bg-info">
                <div class="card-header">Total Rentals</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalRentals }}</h5>
                    <p class="card-text">Total number of rentals made.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Total Earnings -->
        <div class="col-md-4">
            <div class="mb-3 text-white card bg-warning">
                <div class="card-header">Total Earnings</div>
                <div class="card-body">
                    <h5 class="card-title">${{ $totalEarnings }}</h5>
                    <p class="card-text">Total earnings from all rentals.</p>
                </div>
            </div>
        </div>

        <!-- Total Customers -->
        <div class="col-md-4">
            <div class="mb-3 text-white card bg-danger">
                <div class="card-header">Total Customers</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalCustomers }}</h5>
                    <p class="card-text">Total number of customers.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
