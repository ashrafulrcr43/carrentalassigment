@extends('layouts.app')

@section('content')
    <h1>Your Bookings</h1>

    <!-- Check if there's a success message in the session -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($cars->isEmpty())
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
                @foreach($cars as $car)
                    <tr>
                        <td>{{ $car->car->name }} ({{ $car->car->brand }})</td>
                        <td>{{ $car->start_date }}</td>
                        <td>{{ $car->end_date }}</td>
                        <td>${{ $car->total_cost }}</td>
                        <td>
                            @if(strtotime($car->start_date) > time())
                                <form action="{{ route('admin.rentals.destroy', $car->id) }}" method="POST">
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

    <!-- Add the modal here -->
    <!-- Booking Confirmation Modal -->
    <div class="modal fade" id="bookingConfirmationModal" tabindex="-1" aria-labelledby="bookingConfirmationLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="bookingConfirmationLabel">Booking Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Car booked successfully! Your booking details are available in your bookings section.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a href="{{ route('rentals.index') }}" class="btn btn-primary">View Bookings</a>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
    <!-- Include the script to show the modal if there's a success message -->
    <script>
        @if(session('success'))
            var myModal = new bootstrap.Modal(document.getElementById('bookingConfirmationModal'));
            myModal.show();
        @endif
    </script>
@endsection
