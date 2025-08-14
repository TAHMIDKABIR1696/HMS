<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment; // ✅ Import the model

class PatientController extends Controller
{
    public function bookAppointment()
    {
        // Option A: load a Blade view
        // return view('patient.book-appointment');

        // Option B: redirect to the actual appointment form
        return redirect()->route('patient.book-appointment.form');
    }

    public function home()
    {
        // ✅ Get all appointments for the logged-in patient
        $appointments = Appointment::where('patient_id', Auth::id())->get();

        return view('patient.home', compact('appointments'));

        $appointments = Appointment::where('patient_id', Auth::id())
    ->latest()
    ->get();
        
    }
}


