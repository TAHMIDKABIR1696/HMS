<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\Report;

class PatientController extends Controller
{
    public function bookAppointment()
    {
        $appointments = Appointment::where('patient_id', Auth::id())->get();
        return view('patient.book-appointment', compact('appointments'));
    }

    public function home()
    {
        // ✅ Get all appointments for the logged-in patient
        $appointments = Appointment::where('patient_id', Auth::id())->get();

        return view('patient.home', compact('appointments'));
        
    }


}


