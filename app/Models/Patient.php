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

        // Relationship with guardians
        public function guardians()
        {
            return $this->hasMany(Guardian::class);
        }

        // Relationship with admissions
        public function admission()
        {
            return $this->hasOne(Admission::class);
        }

        // Relationship with doctor visits
        public function doctorVisits()
        {
            return $this->hasMany(DoctorVisit::class);
        }

        public function discharge()
        {
            return $this->hasOne(Discharge::class);
        }

        public function isDischarged()
        {
            return !is_null($this->discharged_at);
        }


}
