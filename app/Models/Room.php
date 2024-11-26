<?php

namespace App\Models;

use App\Models\Ward;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['room_number', 'ward_id', 'beds', 'type'];

    // Relationship with ward
    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }
}
