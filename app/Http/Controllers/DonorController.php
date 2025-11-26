<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function showRegistrationForm()
    {
        return view('donor.register');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'full_name'          => 'required|string|max:255',
                'nic'                => 'required|string|max:20|unique:donors,nic',
                'dob'                => 'required|date|before:today',
                'address'            => 'nullable|string|max:500',
                'mail'               => 'nullable|email|max:255',
                'phone_number'       => 'required|string|max:20',
                'gender'             => 'required|in:male,female',
                'health_status'      => 'nullable|string|max:500',
                'blood_type'         => 'required|in:A+,A-,B+,B-,O+,O-,AB+,AB-',
                'weight'             => 'nullable|numeric|min:0',
                'last_donation_date' => 'nullable|date|before_or_equal:today',
                'donation_frequency' => 'nullable|in:once,every_3_months,every_6_months,yearly',
                'emergency_contact'  => 'nullable|string|max:255',
                'notes'              => 'nullable|string|max:1000',
            ]);

            Donor::create($validated);
            return redirect()->route('donor-blood-donations.create')->with('success', 'Hospital registered successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
}
