<?php

namespace App\Models;

use App\Models\Ward;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['room_number', 'ward_id', 'beds', 'room_type_id'];

    /**
     * Relationship with RoomType.
     */
    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    /**
     * Relationship with Ward.
     */
    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }
}

