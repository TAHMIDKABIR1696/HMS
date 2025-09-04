<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Doctor: show form to create a report
     */
    public function create()
    {
        // Only list patients
        $patients = User::where('usertype', 'patient')->get();
        return view('doctor.report-create', compact('patients'));
    }

    /**
     * Doctor: store a new report
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'report_text' => 'required|string',
        ]);

        Report::create([
            'doctor_id' => Auth::id(),
            'patient_id' => $request->patient_id,
            'report_text' => $request->report_text,
        ]);

        return redirect()->back()->with('success', 'Report created successfully.');
    }

    /**
     * Patient: view own reports
     */
    public function patientReports()
    {
        $reports = Report::where('patient_id', Auth::id())
            ->with('doctor')
            ->latest()
            ->get();

        return view('patient.reports', compact('reports'));
    }

    /**
     * Doctor: view reports they have written
     */
    public function doctorReports()
    {
        $reports = Report::where('doctor_id', Auth::id())
            ->with('patient')
            ->latest()
            ->get();

        return view('doctor.report-create', compact('reports'));
    }
}
