<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;

class DoctorController extends Controller
{
    // Show all appointments for this doctor
    public function checkAppointments()
    {
        $appointments = Appointment::where('doctor_id', Auth::id())
            ->orderBy('date', 'asc')
            ->get();

        return view('doctor.appointments', compact('appointments'));
    }

    public function appointment()
    {
        $appointments = Appointment::where('doctor_id', Auth::id())->latest()->get();
        return view('doctor.appointments', compact('appointments'));
    }

    // Approve appointment
    public function approve($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'approved';
        $appointment->save();

        return back()->with('success', 'Appointment approved successfully!');
    }

    // Cancel appointment
    public function cancel($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'cancelled';
        $appointment->save();

        return back()->with('error', 'Appointment cancelled.');
    }

}
