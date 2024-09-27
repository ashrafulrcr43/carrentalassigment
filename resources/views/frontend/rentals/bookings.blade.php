@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Book a Car</h1>

    <form id="bookingForm" action="{{ route('admin.rentals.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="car_id" class="form-label">Select Car</label>
            <select class="form-select" id="car_id" name="car_id" required>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Book Car</button>
      
    </form>

    <!-- Success Modal -->
    <div class="modal fade" id="bookingSuccessModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Booking Successful</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Your car has been booked successfully!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('bookings.index') }}" class="btn btn-primary">View My Bookings</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('bookingForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Submit the form using AJAX
        const formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (response.ok) {
                // Show the modal
                var myModal = new bootstrap.Modal(document.getElementById('bookingSuccessModal'));
                myModal.show();

                this.reset(); // Clear the form after showing the modal
            } else {
                console.error('Error during booking.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>
@endsection
