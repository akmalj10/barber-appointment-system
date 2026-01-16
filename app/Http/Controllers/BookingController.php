<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Make sure you have a Booking model
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        return view('booking');
    }

    public function store(Request $request)
    {
        // 1. Validate the incoming form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'email' => 'required|email',
            'service' => 'required',
            'date' => 'required|date',
            'hour' => 'required',
            'minute' => 'required',
            'ampm' => 'required',
        ]);

        // 2. Format the time string
        $time = $validated['hour'] . ':' . $validated['minute'] . ' ' . $validated['ampm'];

        // 3. Save to database
        // Note: Ensure your 'bookings' table has these columns
        \App\Models\Booking::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'service' => $validated['service'],
            'date' => $validated['date'],
            'time' => $time,
        ]);

return redirect()->route('booking')->with('success', 'Your booking has been successfully placed!');    }
}