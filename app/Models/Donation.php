<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'hospital_id',
        'blood_type',
        'quantity',
        'donation_date',
        'notes',
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
