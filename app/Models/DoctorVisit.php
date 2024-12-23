<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorVisit extends Model
{
    protected $guarded = [];

    public function inpatient()
    {
        return $this->belongsTo(Patient::class, 'inpatient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
