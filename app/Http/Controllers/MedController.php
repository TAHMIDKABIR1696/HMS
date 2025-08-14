<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedController extends Controller
{
    public function index()
    {
        // Example static medicine list (later replace with DB model)
        $medicines = [
            ['id' => 1, 'name' => 'Paracetamol', 'price' => 5.00, 'stock' => 100],
            ['id' => 2, 'name' => 'Amoxicillin', 'price' => 12.50, 'stock' => 50],
            ['id' => 3, 'name' => 'Vitamin C', 'price' => 8.00, 'stock' => 200],
        ];

        return view('patient.medicine-store', compact('medicines'));
    }

    public function purchase(Request $request)
    {
        $request->validate([
            'medicine_id' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);

        // For now just simulate purchase
        return back()->with('success', 'Medicine purchased successfully!');
    }
}