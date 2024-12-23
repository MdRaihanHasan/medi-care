<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientServiceSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'patient_id',
        'patient_type',
        'date',
        'start_time',
        'end_time',
        'status',
        'bill_amount',
        'paid_status',
        'status',
    ];

    // Relationship to Service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Relationship to Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
