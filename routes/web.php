<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Traveling\TravelingController;
use App\Http\Controllers\Offer\OfferController;
use App\Http\Controllers\Admins\AdminsController;
use App\Http\Controllers\Users\UsersController;
use Illuminate\Support\Facades\Auth; // Ensure Auth facade is imported

// Home Route
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Auth::routes();

// Home Controller Route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route for TravelingController's about method (with ID)
Route::get('traveling/about/{id}', [TravelingController::class, 'about'])->name('traveling.about');

// Route for about page (with ID)
Route::get('/about/{id}', [TravelingController::class, 'about'])->name('about');

// Reservation Routes
Route::get('traveling/reservation/{id}', [TravelingController::class, 'makeReservations'])->name('traveling.reservation');
Route::post('traveling/reservation/{id}', [TravelingController::class, 'storeReservations'])->name('traveling.reservation.store');

// Success Route for Reservation
Route::get('traveling/reservation/success', [TravelingController::class, 'reservationSuccess'])->name('traveling.reservation.success');

// PayPal and Success Routes
Route::get('traveling/pay', [TravelingController::class, 'payWithPaypal'])->name('traveling.pay');
Route::get('traveling/success', [TravelingController::class, 'success'])->name('traveling.success');

// User Bookings Route
Route::get('users/my-bookings', [UsersController::class, 'bookings'])->name('users.bookings');

// Admin Login Routes
Route::get('admin/login', [AdminsController::class, 'viewLogin'])->name('view.login');
Route::post('admin/login', [AdminsController::class, 'checkLogin'])->name('check.login');

// Admin Dashboard Route
Route::get('admin/index', [AdminsController::class, 'index'])->name('admins.dashboard');

// Admin Logout Route
Route::post('admin/logout', [AdminsController::class, 'logout'])->name('admin.logout');

// Protected Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('/index', [AdminsController::class, 'index'])->name('admins.dashboard');
    Route::get('/all-admins', [AdminsController::class, 'allAdmins'])->name('admins.all.admins');
    Route::get('/create-admins', [AdminsController::class, 'createAdmins'])->name('admins.create');
    Route::post('/create-admins', [AdminsController::class, 'storeAdmins'])->name('admins.store');


    Route::get('/all-destinations', [AdminsController::class, 'allDestinations'])->name('all.destinations');
    Route::get('/create-destinations', [AdminsController::class, 'createDestinations'])->name('create.destinations');
    Route::post('/create-destinations', [AdminsController::class, 'createDestinations'])->name('store.destinations');
    Route::get('/delete-destinations/{id}', [AdminsController::class, 'deleteDestinations'])->name('delete.destinations');

    Route::get('/all-cities', [AdminsController::class, 'allCities'])->name('all.cities');
    Route::get('/create-cities', [AdminsController::class, 'createCities'])->name('create.cities');
    Route::post('/create-cities', [AdminsController::class, 'storeCities'])->name('store.cities');
    Route::get('/delete-cities/{id}', [AdminsController::class, 'deleteCities'])->name('delete.cities');

    Route::get('/all-bookings', [AdminsController::class, 'allBookings'])->name('all.bookings');
    Route::get('/edit-bookings/{id}', [AdminsController::class, 'editBookings'])->name('edit.bookings');
    Route::post('/update-bookings/{id}', [AdminsController::class, 'updateBookings'])->name('update.bookings');
});

