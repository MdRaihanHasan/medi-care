<?php

namespace App\Http\Controllers;

use App\Models\Discharge;
use App\Models\Patient;
use Illuminate\Http\Request;

class DischargeController extends Controller
{

    // show the form for creating a new resource
    // public function create($patientId)
    // {
    //     $patient = Patient::findOrFail($patientId);

    //     // Check if the patient is already discharged
    //     if ($patient->discharge) {
    //         return redirect()->back()->with('error', 'Patient is already discharged.');
    //     }

    //     return view('dashboard.discharges.store', compact('patient'));
    // }

    // public function store(Request $request, $patientId)
    // {
    //     $request->validate([
    //         'discharge_date' => 'required|date',
    //         'discharge_reason' => 'required|string|max:255',
    //         'remarks' => 'nullable|string',
    //     ]);

    //     $patient = Patient::findOrFail($patientId);

    //     // Ensure bills are cleared before discharge
    //     if ($patient->bills->where('status', 'unpaid')->count() > 0) {
    //         return redirect()->back()->with('error', 'All bills must be cleared before discharge.');
    //     }

    //     Discharge::create([
    //         'patient_id' => $patientId,
    //         'discharge_date' => $request->discharge_date,
    //         'discharge_reason' => $request->discharge_reason,
    //         'remarks' => $request->remarks,
    //         'bills_cleared' => true,
    //     ]);

    //     // Update patient status to discharged
    //     $patient->update(['status' => 'discharged']);

    //     return redirect()->route('dashboard.patients.index')->with('success', 'Patient discharged successfully.');
    // }

        // Show the discharge form
        public function show(Patient $patient)
        {
            // You can pass the patient to the view if needed
            return view('dashboard.discharge.store', compact('patient'));
        }

        // Store the discharge details
        public function store(Request $request, Patient $patient)
        {
            // Validate the request
            $request->validate([
                'discharge_date' => 'required',
                'note' => 'nullable|string',
                'bill' => 'nullable|string',
                'bill_amount' => 'required|numeric',
            ]);

            // Set the discharge date
            $patient->discharged_at = $request->discharge_date;
            $patient->note = $request->note; // You can also store additional notes
            $patient->bill = $request->bill; // You can also store additional notes
            $patient->bill_amount = $request->bill_amount; // You can also store additional notes
            $patient->save();

            // Redirect to the patient list or another page with a success message
            return redirect()->route('dashboard.patient')->with('success', 'Patient has been discharged successfully.');
        }

}
