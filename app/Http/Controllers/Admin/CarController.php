<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class CarController extends Controller
{

    public function index(Request $request)

    {
        $brands = Car::select('brand')->distinct()->pluck('brand');
        $carTypes = Car::select('car_type')->distinct()->pluck('car_type');
        $cars = Car::all(); // Fetch all cars to display

           // Define car types (or fetch from database)
           $carTypes = ['SUV', 'Sedan', 'Truck', 'Coupe', 'Convertible'];

        $query = Car::query();

        // Apply filters if they exist
        if ($request->filled('car_type')) {
            $query->where('car_type', $request->car_type);
        }
    
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }
    
        if ($request->filled('max_price')) {
            $query->where('daily_rent_price', '<=', $request->max_price);
        }
    
        // Fetch the filtered cars
        $cars = $query->get();
    
        // return view('frontend.home', compact('cars','carTypes', 'brands'));
        return view('admin.cars.index', compact('cars', 'carTypes', 'brands'));
     
        // $cars = Car::all();
        // return view('admin.cars.index', compact('cars'));
    }

  
    public function create()
    {
      
        return view('admin.cars.create');
    }

    // Store a new car in the database
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'car_type' => 'required|string',
            'daily_rent_price' => 'required|numeric|min:0',
            'availability' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;
        if($request->has('image')){
            $imageName = time().'.'.$request->image->getClientOriginalName();
            $request->image->move(public_path('car_images'),$imageName);
        }

    Car::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'car_type' => $request->car_type,
            'daily_rent_price' => $request->daily_rent_price,
            'availability' => $request->availability,
            // 'image' => $imagePath,
            'image' => $imageName,
            
        ]);

        return redirect()->route('admin.cars.index')->with('success', 'Car added successfully');
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);

        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'car_type' => 'required|string',
            'daily_rent_price' => 'required|numeric|min:0',
            'availability' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $car = Car::findOrFail($id);

        if ($request->file('image')) {
            if ($car->image) {
                Storage::delete($car->image);
            }

            $imagePath = $request->file('image')->store('car_images');
        } else {
            $imagePath = $car->image;  
        }

        $car->update([
            'name' => $request->name,
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'car_type' => $request->car_type,
            'daily_rent_price' => $request->daily_rent_price,
            'availability' => $request->availability,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        if ($car->image) {
            Storage::delete($car->image);
        }

        $car->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully');
    }
}
