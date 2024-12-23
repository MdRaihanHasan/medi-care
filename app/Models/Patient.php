<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function treatments()
    {
        return $this->hasMany(PatientTreatment::class);
    }
    public function serviceSchedules()
    {
        return $this->hasMany(PatientServiceSchedule::class);
    }

}
