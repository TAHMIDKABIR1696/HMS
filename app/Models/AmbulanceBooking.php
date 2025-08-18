<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbulanceBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name', 'phone', 'pickup_area', 'pickup_address',
        'drop_hospital', 'ambulance_type', 'distance_km', 'total_fee'
    ];
}
