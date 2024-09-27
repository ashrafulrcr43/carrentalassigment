<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    // Home page
    public function home(Request $request)
    {
        // Retrieve unique car types and brands from the database
        $carTypes = Car::select('car_type')->distinct()->pluck('car_type');
        $brands = Car::select('brand')->distinct()->pluck('brand');
        $cars = Car::all(); //ssumes brand is a column in the cars table

        // Filtering logic based on request inputs (filters)
        $query = Car::query();

        if ($request->filled('car_type')) {
            $query->where('car_type', $request->car_type);
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('max_price')) {
            $query->where('daily_rent_price', '<=', $request->max_price);
        }

        // Get the filtered cars
        $cars = $query->get();

        // Return the view with the necessary data
        return view('frontend.home', compact('carTypes', 'brands', 'cars'));
    }
    

    // About page
    public function about()
    {
        return view('frontend.about');
    }

    // Contact page
    public function contact()
    {
        return view('frontend.contact');
    }
    public function showLoginForm()
    {
        return view('frontend.login');  // Create a Blade file for the login form
    }

    // Handle the login form submission
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect to the homepage after successful login
            return redirect()->intended('/');
        }

        // If login fails, redirect back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    // Handle the logout
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the login page after logout
        return redirect('/login');
    }
}
