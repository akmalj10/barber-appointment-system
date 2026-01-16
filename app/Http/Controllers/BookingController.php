<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; 
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display the booking form.
     */
    public function index()
    {
        return view('booking');
    }

    /**
     * Store a newly created booking in the database.
     */
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

        // 2. Format the time string from separate dropdowns
        $time = $validated['hour'] . ':' . $validated['minute'] . ' ' . $validated['ampm'];

        // 3. Save to database
        Booking::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'service' => $validated['service'],
            'date' => $validated['date'],
            'time' => $time,
            'status' => 'Pending',
        ]);

        return redirect()->route('booking')->with('success', 'Your booking has been successfully placed!');
    }

    
    /**
     * Display a list of the authenticated user's appointments.
     */
    public function listAppointments()
    {
        // Fetch only bookings belonging to the logged-in user
        $appointments = Booking::where('user_id', Auth::id())
                                ->orderBy('date', 'desc')
                                ->get();

        return view('appointments', compact('appointments'));
    }

    /**
     * Update the status of a specific appointment to 'Canceled'.
     */
    public function cancel($id)
    {
        // Ensure the user can only cancel their own appointments
        $appointment = Booking::where('id', $id)
                              ->where('user_id', Auth::id())
                              ->firstOrFail();
        
        $appointment->update(['status' => 'Canceled']);

        return redirect()->back()->with('success', 'Appointment successfully canceled.');
    }
}