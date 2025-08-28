<?php

namespace App\Http\Controllers;
use App\Models\AmbulanceBooking;
use App\Models\Appointment;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    // List of patients
    public function patients()
    {
        $patients = User::where('usertype', 'patient')->get();
        return view('admin.patients', compact('patients'));
    }

    // List of doctors
    public function doctors()
    {
        $doctors = User::where('usertype', 'doctor')->get();
        return view('admin.doctors', compact('doctors'));
    }

    public function ambulanceBookings()
    {
        $bookings = AmbulanceBooking::all();
        return view('admin.ambulance-bookings', compact('bookings'));
    }

    // Approve an ambulance booking
    public function approveAmbulanceBooking($id)
    {
        $booking = AmbulanceBooking::findOrFail($id);
        $booking->status = 'approved';
        $booking->save();

        return redirect()->back()->with('success', 'Ambulance booking approved.');
    }
    // Cancel a booking
    public function cancelAmbulanceBooking($id)
    {
        $booking = AmbulanceBooking::findOrFail($id);
        $booking->status = 'cancelled';
        $booking->save();

        return redirect()->back()->with('success', 'Ambulance booking cancelled.');
    }

    public function home()
    {
        // Count patients and doctors
        $patientsCount = User::where('', 'patient')->count();
        $doctorsCount = User::where('', 'doctor')->count();

        // Count total appointments
        $appointmentsCount = Appointment::count();

        // Count total ambulance bookings
        $ambulanceBookingsCount = AmbulanceBooking::count();

        // Pass variables to view
        return view('admin.dashboard', compact(
            'patientsCount',
            'doctorsCount',
            'appointmentsCount',
            'ambulanceBookingsCount'
        ));
    }
}
