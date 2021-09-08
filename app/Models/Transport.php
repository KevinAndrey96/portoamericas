<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'plaque',
        'type',
        'color',
        'parkingnum',
        'own',
        'resident_id'

    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

}
