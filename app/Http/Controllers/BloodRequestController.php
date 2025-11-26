<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\HospitalBloodRequest;
use Illuminate\Http\Request;

class BloodRequestController extends Controller
{
    public function create()
    {
        $hospitals = Hospital::where('is_active', 1)->get();
        return view('hospital.request', compact('hospitals'));
    }

    public function hospitalStoreBloodRequest(Request $request)
    {
        try {
            $request->validate([
                'hospital_id' => 'required|exists:hospitals,id',
                'blood_type' => 'required|in:A+,A-,B+,B-,O+,O-,AB+,AB-',
                'units' => 'required|integer|min:1',
                'request_date' => 'required|date|after_or_equal:today',
                'notes' => 'nullable|string|max:500',
            ]);

            // Assuming only one blood bank exists with id = 1
            HospitalBloodRequest::create([
                'hospital_id' => $request->hospital_id,
                'blood_type' => $request->blood_type,
                'units' => $request->units,
                'request_date' => $request->request_date,
                'notes' => $request->notes,
            ]);

            return redirect()->back()->with('success', 'Blood request submitted successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
}
