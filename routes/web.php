<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Auth\LoginController;



// Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')
->middleware(['auth', 'verified']);

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    

    
Route::middleware(['auth', 'admin'])->group(function () {
        Route::resource('admin/cars', Admin\CarController::class);
    });


Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin/cars', admin\CarController::class);
});

Route::middleware(['is_admin'])->group(function () {
    Route::get('/admin/cars', [admin\CarController::class, 'index']);
});


// Grouped admin routes protected by 'auth' and 'is_admin' middleware
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {

    // Car Management Routes
    Route::resource('cars', admin\CarController::class);

    // Rental Management Routes
    Route::resource('rentals', admin\RentalController::class);

    // Customer Management Routes
    Route::resource('customers', admin\CustomerController::class);
});

// Frontend Routes
Route::get('/cars', [Frontend\CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{id}', [Frontend\CarController::class, 'show'])->name('cars.show');
Route::get('/', [Frontend\PageController::class, 'home'])->name('home');
Route::get('/about', [Frontend\PageController::class, 'about'])->name('about');
Route::get('/contact', [Frontend\PageController::class, 'contact'])->name('contact');

// admin route
// // Protect Admin Dashboard and other admin routes
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('cars', Admin\CarController::class);
    Route::resource('rentals', Admin\RentalController::class);
    Route::resource('customers', Admin\CustomerController::class);
});

Route::middleware('auth')->group(function (){
    Route::get('rentals', [AdminRentalController::class, 'index'])->name('admin.rentals.index');
    Route::get('rentals/create', [AdminRentalController::class, 'create'])->name('admin.rentals.create');
    Route::post('rentals', [AdminRentalController::class, 'store'])->name('admin.rentals.store');
    Route::get('rentals/{id}/edit', [AdminRentalController::class, 'edit'])->name('admin.rentals.edit');
    Route::put('rentals/{id}', [AdminRentalController::class, 'update'])->name('admin.rentals.update');
    Route::delete('rentals/{id}', [AdminRentalController::class, 'destroy'])->name('admin.rentals.destroy');
});

// Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
//     Route::resource('rentals', AdminRentalController::class);
// });
// Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
//     Route::resource('cars', Admin\CarController::class);
// });


require __DIR__.'/auth.php';
