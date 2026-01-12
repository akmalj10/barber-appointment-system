<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('auth.login'); // Show login page by default
});

// Optional: redirect /dashboard after login
Route::get('/dashboard', function () {
    return view('dashboard'); // Breeze already has this view
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
