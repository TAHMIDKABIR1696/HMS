<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    // Doctor: create report
    public function create($appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        return view('doctor.report-create', compact('appointment'));
    }

    public function store(Request $request, $appointmentId)
    {
        $request->validate([
            'report_text' => 'required|string|max:2000',
        ]);

        $appointment = Appointment::findOrFail($appointmentId);

        Report::create([
            'doctor_id' => Auth::id(),
            'patient_id' => $appointment->patient_id,
            'appointment_id' => $appointment->id,
            'report_text' => $request->report_text,
        ]);

        return redirect()->route('doctor.reports')->with('success', 'Report created successfully.');
    }

    // Doctor: view all reports written
    public function doctorReports()
    {
        $reports = Report::where('doctor_id', Auth::id())->latest()->get();
        return view('doctor.reports', compact('reports'));
    }

    // Patient: view own reports
    public function patientReports()
    {
        $reports = Report::where('patient_id', Auth::id())->latest()->get();
        return view('patient.reports', compact('reports'));
    }
}