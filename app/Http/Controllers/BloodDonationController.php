<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\DonationRequest;
use App\Models\Donor;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BloodDonationController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:hospital');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create()
    {
        $hospitals = Hospital::where('is_active', 1)->get();
        return view('hospital.donation', compact(['hospitals']));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'blood_type'     => 'required|string',
            'quantity'       => 'required|integer|min:1',
            'donation_date'  => 'required|date',
            'notes'          => 'nullable|string',
        ]);

        $validated['hospital_id'] = Auth::id();

        Donation::create($validated);

        return redirect()->back()->with('success', 'Blood donation record added successfully.');
    }

    public function donorRequestForm()
    {
        $hospitals = Hospital::orderBy('name')->get();
        $donors = Donor::orderBy('full_name')->get();
        return view('donor.request', compact(['hospitals', 'donors']));
    }

    public function donorDonationStore(Request $request)
    {
        try {
            $request->validate([
                'hospital_id' => 'required',
                'donor_id' => 'required',
                'blood_type' => 'required|in:A+,A-,B+,B-,O+,O-,AB+,AB-',
                'units' => 'required|integer|min:1',
                'request_date' => 'required|date|after_or_equal:today',
                'notes' => 'nullable|string|max:500',
            ]);

            DonationRequest::create([
                'hospital_id' => $request->hospital_id,
                'donor_id' => $request->donor_id,
                'blood_type' => $request->blood_type,
                'units' => $request->units,
                'request_date' => $request->request_date,
                'notes' => $request->notes,
            ]);

            return redirect()->back()->with('success', 'Blood donation request submitted successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
}
