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
                'password'       => 'nullable|string|min:6',
            ]);
            
            // Handle is_active checkbox
            $validated['is_active'] = $request->has('is_active');

            // Hash password if provided
            if (!empty($validated['password'])) {
                $validated['password'] = Hash::make($validated['password']);
            } else {
                // Remove password from validated data if not provided
                unset($validated['password']);
            }

            Hospital::create($validated);

            return redirect()->route('blood-donations.create')->with('success', 'Hospital registered successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Registration failed: ' . $e->getMessage()]);
        }
    }
}
