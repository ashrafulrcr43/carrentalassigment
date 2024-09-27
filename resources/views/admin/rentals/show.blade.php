@extends('layouts.app')

@section('content')
    <h1>Your Bookings</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($rentals->isEmpty())
        <p>You have no bookings at the moment.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Car</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Total Cost</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rentals as $rental)
                    <tr>
                        <td>{{ $rental->car->name }} ({{ $rental->car->brand }})</td>
                        <td>{{ $rental->start_date }}</td>
                        <td>{{ $rental->end_date }}</td>
                        <td>${{ $rental->total_cost }}</td>
                        <td>
                            @if(strtotime($rental->start_date) > time())
                                <form action="{{ route('admin.rentals.destroy', $rental->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Cancel Booking</button>
                                </form>
                            @else
                                <span>Rental in progress or completed</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
