<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Make sure you have a Booking model
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function myAppointments()
    {
        // Fetch bookings for the authenticated user, ordered by date descending
        $bookings = Booking::where('user_id', Auth::id())
                            ->orderBy('date', 'desc')
                            ->orderBy('time', 'desc')
                            ->get();

        // Return the view with bookings data
        return view('my-appointments', compact('bookings'));
    }

    // Optional: Add a destroy method for canceling bookings
    public function destroy(Booking $booking)
    {
        // Ensure the booking belongs to the user
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $booking->delete();

        return redirect()->route('my.appointments')->with('success', 'Appointment canceled successfully.');
    }

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