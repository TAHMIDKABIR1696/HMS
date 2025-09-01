<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AmbulanceBooking;

class AmbulanceBookingController extends Controller
{
    private $baseRate = 50; // BDT per km
    private $ambulanceRates = [
        'Normal' => 1.0,
        'ICU' => 2.0,
        'Freezer' => 2.5,
    ];

    // Area → Hospital + Distance
    private $areaToHospital = [
        'Banani' => [
            ['name' => 'United Hospital', 'distance' => 8],
            ['name' => 'Banani General Hospital', 'distance' => 7],
            ['name' => 'Banani Specialized Clinic', 'distance' => 9],
            // add more hospitals here
        ],
        'Dhanmondi' => [
            ['name' => 'Labaid Hospital', 'distance' => 6],
            ['name' => 'Popular Diagnostic', 'distance' => 7],
            ['name' => 'Ibn Sina Hospital', 'distance' => 5],
        ],
        'Bashundhara' => [
            ['name' => 'Apollo Hospital', 'distance' => 12],
            ['name' => 'Evercare Hospital', 'distance' => 11],
        ],
        'Panthapath' => [
            ['name' => 'Square Hospital', 'distance' => 5],
            ['name' => 'Samorita Hospital', 'distance' => 6],
        ],
    ];

    public function create()
    {
        $areas = array_keys($this->areaToHospital);
        $ambulanceTypes = ['Normal', 'ICU', 'Freezer'];

        return view('patient.ambulance-booking', [
            'areas' => $areas,
            'ambulanceTypes' => $ambulanceTypes,
            'areaToHospital' => $this->areaToHospital,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'pickup_area' => 'required|string|max:255',
            'pickup_address' => 'required|string|max:255',
            'drop_hospital' => 'required|string',
            'ambulance_type' => 'required|string',
        ]);

        // Use fixed distance based on pickup area
        $distanceKm = $this->areaToHospital[$request->pickup_area]['distance'] ?? rand(5, 20);

        $rateMultiplier = $this->ambulanceRates[$request->ambulance_type] ?? 1;
        $totalFee = $distanceKm * $this->baseRate * $rateMultiplier;

        AmbulanceBooking::create([
            'patient_name' => $request->patient_name,
            'phone' => $request->phone,
            'pickup_area' => $request->pickup_area,
            'pickup_address' => $request->pickup_address,
            'drop_hospital' => $request->drop_hospital,
            'ambulance_type' => $request->ambulance_type,
            'distance_km' => $distanceKm,
            'total_fee' => $totalFee,
        ]);

        return redirect()->route('patient.ambulance-booking')
            ->with('success', "Booking Confirmed! Distance: {$distanceKm} km, Total Fee: {$totalFee} BDT");
    }
}