<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ward extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'capacity'];

    // Relationship with rooms
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
