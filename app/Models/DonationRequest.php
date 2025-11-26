<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{
    protected $fillable = ['hospital_id', 'donor_id', 'blood_type', 'units', 'request_date', 'notes'];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
