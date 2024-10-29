<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorInfo extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class); // Adjust as necessary if you have foreign key
    }
}
