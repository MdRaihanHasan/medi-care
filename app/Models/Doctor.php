<?php

namespace App\Models;

use App\Models\DoctorInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function doctorInfo()
    {
        return $this->hasOne(DoctorInfo::class); // Adjust as necessary if you have foreign key
    }

}
