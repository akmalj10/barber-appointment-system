<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; 
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    public function index()
    {
        return view('booking');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'email' => 'required|email',
            'service' => 'required|array|min:1',
            'service.*' => 'string',
            'date' => 'required|date',
            'hour' => 'required',
            'minute' => 'required',
            'ampm' => 'required',
        ]);

        $time = $validated['hour'] . ':' . $validated['minute'] . ' ' . $validated['ampm'];

        $service = implode(', ', $validated['service']);


        Booking::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'service' => $service,
            'date' => $validated['date'],
            'time' => $time,
            'status' => 'Pending',
        ]);

        return redirect()->route('booking')->with('success', 'Your booking has been successfully placed!');
    }

    

    public function listAppointments()
    {
        $appointments = Booking::where('user_id', Auth::id())
                                ->orderBy('date', 'desc')
                                ->get();

        return view('appointments', compact('appointments'));
    }


    public function cancel($id)
    {
        $appointment = Booking::where('id', $id)
                              ->where('user_id', Auth::id())
                              ->firstOrFail();
        
        $appointment->update(['status' => 'Canceled']);

        return redirect()->back()->with('success', 'Appointment successfully canceled.');
    }
}