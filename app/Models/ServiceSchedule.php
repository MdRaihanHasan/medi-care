<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id', 'date', 'start_time', 'end_time', 'status',
    ];

    // Relationship with the Service model
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

