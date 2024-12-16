<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'medicine_category_id',
        'manufacturer',
        'dosage_form',
        'strength',
        'price',
        'stock',
    ];

    public function category()
    {
        return $this->belongsTo(MedicineCategory::class, 'medicine_category_id');
    }
}

