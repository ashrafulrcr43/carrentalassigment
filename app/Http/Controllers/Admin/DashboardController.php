<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCars = Car::count();
        $availableCars = Car::where('availability', 1)->count();
        $totalRentals = Rental::count();
        $totalEarnings = Rental::sum('total_cost');
        $totalCustomers = User::where('role', 'customer')->count();

        return view('dashboard', compact(
            'totalCars', 'availableCars', 'totalRentals', 'totalEarnings', 'totalCustomers'
        ));
    }
}
