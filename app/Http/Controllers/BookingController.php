<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; 
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
<<<<<<< HEAD
    /**
     * Display the booking form.
     */
=======
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

>>>>>>> 96b4478df7e564d5d1d8175df1ee415827af2c9a
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