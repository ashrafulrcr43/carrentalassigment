<?php 
namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Container\Attributes\Auth;

class RentalController extends Controller
{
    // Display the list of all rentals in the admin page
    public function index()
    {
        $rentals = Rental::with('car', 'user')->get(); // Fetch rentals along with car and user data
        return view('admin.rentals.index', compact('rentals'));
    }

    // Show the form for editing a rental
    public function edit($id)
    {
        $rental = Rental::findOrFail($id);
        return view('admin.rentals.edit', compact('rental'));
    }
    public function create()
{
    $cars = Car::all(); // Assuming you want to create rentals for cars
    return view('admin.rentals.create', compact('cars'));
}

public function store(Request $request) {
    $validatedData = $request->validate([
        'car_id' => 'required|exists:cars,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'total_cost' => 'required|numeric',
    ]);

    Rental::create($validatedData);
    return redirect()->route('rentals.index')->with('success', 'Rental created successfully.');
}


    // Update a rental
    public function update(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);

        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'total_cost' => 'required|numeric',
        ]);

        $rental->update($request->all());

        return redirect()->route('rentals.index')->with('success', 'Rental updated successfully');
    }

    // Delete a rental
    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->delete();

        return redirect()->route('rentals.index')->with('success', 'Rental deleted successfully');
    }
}
