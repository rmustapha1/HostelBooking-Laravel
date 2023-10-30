<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComplaintController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Authentication routes
Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// User Routes
Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create');
Route::post('/users', 'UserController@store');
Route::get('/users/{user_id}', [UserController::class, 'show'])->name('user.show');
Route::get('/users/{user}/edit', 'UserController@edit');
Route::put('/users/{user_id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/users/{user}', 'UserController@destroy');

// Hostel Routes
Route::get('/hostels', [HostelController::class, 'index'])->name('hostels.index');
Route::get('/hostels/create', 'HostelController@create');
Route::post('/hostels', 'HostelController@store');
Route::get('/hostels/{hostel}', [HostelController::class, 'show'])->name('hostels.show');
Route::get('/hostels/{hostel}/edit', 'HostelController@edit');
Route::put('/hostels/{hostel}', 'HostelController@update');
Route::delete('/hostels/{hostel}', 'HostelController@destroy');

// Booking Routes
Route::get('booking/step1/{room_id}', [BookingController::class, 'step1'])
    ->name('booking.step1')
    ->middleware('auth'); // Use the 'auth' middleware to protect this route
Route::post('booking/saveBooking', [BookingController::class, 'saveBooking'])->name('booking.saveBooking');
Route::get('booking/step2/{bookingId}', [BookingController::class, 'step2'])
    ->name('booking.step2')
    ->middleware('auth'); // Use the 'auth' middleware to protect this route
Route::get('booking/invoice/{bookingId}', [PaymentController::class, 'invoice'])->name('booking.invoice');


// Payment Routes
Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);

// Complaint Routes
Route::get('/complaint', [ComplaintController::class, 'index'])->name('complaint.index');
Route::post('/complaint', [ComplaintController::class, 'send'])->name('complaint.send');


// Payment Routes
Route::get('/payments', 'PaymentController@index');
Route::get('/payments/create', 'PaymentController@create');
Route::post('/payments', 'PaymentController@store');
Route::get('/payments/{payment}', 'PaymentController@show');
Route::get('/payments/{payment}/edit', 'PaymentController@edit');
Route::put('/payments/{payment}', 'PaymentController@update');
Route::delete('/payments/{payment}', 'PaymentController@destroy');

// School Routes
Route::get('/schools', 'SchoolController@index');
Route::get('/schools/create', 'SchoolController@create');
Route::post('/schools', 'SchoolController@store');
Route::get('/schools/{school}', 'SchoolController@show');
Route::get('/schools/{school}/edit', 'SchoolController@edit');
Route::put('/schools/{school}', 'SchoolController@update');
Route::delete('/schools/{school}', 'SchoolController@destroy');
