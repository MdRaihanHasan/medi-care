<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bed extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'bed_number',
        'status',
    ];

    /**
     * Relationship: Bed belongs to a Room.
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
