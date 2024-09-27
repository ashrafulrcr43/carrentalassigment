<?php 
namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    // Display a list of rentals
    public function index(Request $request)
    {
       
        $rentals = Rental::all();
        $rentals = Rental::with('car')->paginate(10); // assuming there is a relation with Car
        return view('admin.rentals.index', compact('rentals'));
    }

    // Show the form for creating a new rental
    public function create()
    {
        // Assuming you have a Car model to select from
        $cars = Car::all();
        return view('admin.rentals.create', compact('cars'));
    }

    // Store a newly created rental
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'car_id' => 'required|exists:cars,id',
        'start_date' => 'required|date|after:today',
        'end_date' => 'required|date|after:start_date',
    ]);

    // Check for existing rentals for the selected dates
    $existingRentals = Rental::where('car_id', $validatedData['car_id'])
        ->where(function ($query) use ($validatedData) {
            $query->whereBetween('start_date', [$validatedData['start_date'], $validatedData['end_date']])
                  ->orWhereBetween('end_date', [$validatedData['start_date'], $validatedData['end_date']]);
        })
        ->exists();

    if ($existingRentals) {
        return back()->withErrors('Car is not available for the selected dates.')->withInput();
    }

    // Calculate total cost
    $days = (strtotime($validatedData['end_date']) - strtotime($validatedData['start_date'])) / (60 * 60 * 24);
    $car = Car::findOrFail($validatedData['car_id']);
    $totalCost = $days * $car->daily_rent_price;

    // Attempt to store the rental
    $rental = Rental::create([
        'user_id' => Auth::id(),
        'car_id' => $validatedData['car_id'],
        'start_date' => $validatedData['start_date'],
        'end_date' => $validatedData['end_date'],
        'total_cost' => $totalCost,
    ]);

    if (!$rental) {
        return back()->withErrors('Failed to store rental.')->withInput();
    }

    return redirect()->route('admin.rentals.index')->with('success', 'Rental created successfully!');
}

    // Show the form for editing a rental
    public function edit($id)
    {
        $rental = Rental::findOrFail($id);
        $cars = Car::all();
        return view('admin.rentals.edit', compact('rental', 'cars'));
    }

    // Update the specified rental
    public function update(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);
        
        $validatedData = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
            'total_cost' => 'required|numeric',
        ]);

        $rental->update($validatedData);

        return redirect()->route('admin.rentals.index')->with('success', 'Rental updated successfully!');
    }

    // Remove the specified rental
    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->delete();

        return redirect()->route('admin.rentals.index')->with('success', 'Rental deleted successfully!');
    }
}
