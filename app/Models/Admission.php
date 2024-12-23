<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $guarded = [];
    // Relationship to patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

        // Optionally define the relationship to a single guardian (if each admission has only one guardian)
        public function guardian()
        {
            return $this->hasOneThrough(Guardian::class, Patient::class);
        }

}

