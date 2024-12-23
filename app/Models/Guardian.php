<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $guarded = [];
    // Relationship to patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}

