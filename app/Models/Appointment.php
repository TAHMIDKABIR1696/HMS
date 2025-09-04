<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{   
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'full_name',
        'email',
        'date',
        'phone',
        'appointment_date',
        'appointment_time',
        'status',
    ];

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }

    
    public function report()
    {
        return $this->hasOne(Report::class);
    }




    
}
