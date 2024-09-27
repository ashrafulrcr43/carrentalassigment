<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Display list of available cars with filters
    public function index(Request $request)
    {
        $query = Car::where('availability', true);

        // Filtering by car type, brand, or price
        if ($request->has('car_type')) {
            $query->where('car_type', $request->input('car_type'));
        }
        if ($request->has('brand')) {
            $query->where('brand', $request->input('brand'));
        }
        if ($request->has('max_price')) {
            $query->where('daily_rent_price', '<=', $request->input('max_price'));
        }

        $cars = $query->get(); // Get all available cars based on filters

        return view('frontend.cars.index', compact('cars'));
    }

    // Display car details for booking
    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('frontend.cars.show', compact('car'));
    }
}

