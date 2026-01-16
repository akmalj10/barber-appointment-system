<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/booking', function () {
    return view('booking');
})->middleware(['auth'])->name('booking');

Route::get('/booking', [BookingController::class, 'index'])->name('booking');

Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

// Route for viewing user's appointments (protected by auth)
Route::get('/my-appointments', [BookingController::class, 'myAppointments'])->middleware('auth')->name('my.appointments');

// Optional: Route for canceling appointments
Route::delete('/booking/{booking}', [BookingController::class, 'destroy'])->middleware('auth')->name('booking.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('services', ServiceController::class);
});

require __DIR__.'/auth.php';
