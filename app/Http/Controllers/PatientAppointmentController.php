<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class PatientAppointmentController extends Controller
{
    public function create()
    {
        $doctors = User::where('usertype', 'doctor')->get(); // assuming you have usertype column
        return view('patient.book-appointment', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'date' => 'required|date',
            'phone' => 'required|string|max:15',
            'doctor_id' => 'required|exists:users,id',
            'message' => 'nullable|string'
        ]);

        Appointment::create([
            'patient_id' => Auth::id(),
            'doctor_id' => $request->doctor_id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'date' => $request->date,
            'phone' => $request->phone,
            'message' => $request->message
        ]);

        return redirect()->route('patient.book-appointment')->with('success', 'Appointment booked successfully!');
    }

    public function myAppointments()
    {
        $appointments = Appointment::where('patient_id', Auth::id())->latest()->get();
        return view('patient.my-appointments', compact('appointments'));
    }
}
