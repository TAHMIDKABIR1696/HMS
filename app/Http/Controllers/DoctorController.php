<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\Report;


class DoctorController extends Controller
{
    // Show all appointments for this doctor
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

    // Income panel
    public function income()
    {
        // Get only approved appointments
        $appointments = Appointment::where('doctor_id', Auth::id())
            ->where('status', 'approved')
            ->get();

        // Each approved appointment = 2000tk
        $totalIncome = $appointments->count() * 2000;

        return view('doctor.income', compact('appointments', 'totalIncome'));
    }

    // Patient history (all appointments for this doctor)
    public function patientHistory()
    {
        $appointments = Appointment::where('doctor_id', Auth::id())
            ->orderBy('date', 'desc')
            ->get();

        return view('doctor.patienthistory', compact('appointments'));
    }
    public function createReport($appointmentId)
    {
        $appointment = Appointment::with('patient')->findOrFail($appointmentId);

        // Only assigned doctor can write report
        if ($appointment->doctor_id != Auth::id()) {
            abort(403);
        }

        return view('doctor.report-create', compact('appointment'));
    }

    public function storeReport(Request $request, $appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);

        Report::create([
            'doctor_id' => Auth::id(),
            'patient_id' => $appointment->patient_id, // must be from users table
            'appointment_id' => $appointment->id,
            'content' => $request->content,
        ]);

        return redirect()->route('doctor.report')->with('success', 'Report saved successfully!');
    }

}
