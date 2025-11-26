<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HospitalAuthController extends Controller
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
        return view('hospital.register');
    }

    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'name'           => 'required|string|max:255',
                'address'        => 'nullable|string',
                'phone_number'   => 'nullable|string|max:15',
                'email'          => 'required|email|unique:hospitals,email',
                'contact_person' => 'nullable|string|max:255',
                'license_number' => 'nullable|string|max:255|unique:hospitals,license_number',
                // 'password'       => 'required|string|min:6',
            ]);
            if (!isset($validated['is_active'])) {
                $validated['is_active'] = true; // Default to true if not provided
            } else {
                $validated['is_active'] = false;
            }

            $validated['password'] = Hash::make($validated['password']);

            Hospital::create($validated);

            return redirect()->route('blood-donations.create')->with('success', 'Hospital registered successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Registration failed: ' . $e->getMessage()]);
            // return redirect()->back()->withErrors(['error' => 'Registration failed: ' . $e->getMessage()]);
        }
    }
}
