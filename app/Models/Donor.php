<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Donor extends Model
{
    use HasRoles;

    protected $fillable = [
        'full_name',
        'nic',
        'dob',
        'address',
        'mail',
        'phone_number',
        'gender',
        'health_status',
        'blood_type',
        'weight',
        'last_donation_date',
        'donation_frequency',
        'emergency_contact',
        'notes',
    ];

    protected $casts = [
        'dob' => 'date',
        'last_donation_date' => 'date',
        'weight' => 'float',
    ];
}
