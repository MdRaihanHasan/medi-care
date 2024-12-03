<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\PatientTreatment;

class PatientTreatmentController extends Controller
{
    public function index()
    {
        $searchTerm = '';
        $patientTreatments = PatientTreatment::with('patient')->get();
        // $patients = Patient::all();
        return view('dashboard.patient_treatments.index', compact('patientTreatments','searchTerm'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $patients = Patient::all();
        return view('dashboard.patient_treatments.store', compact('patients'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'treatment_type' => 'required|string',
            'treatment_details' => 'nullable|string',
            'treatment_date' => 'required|date',
        ]);

        PatientTreatment::create($validated);

        return redirect()->route('dashboard.patient-treatments.index')->with('success', 'Treatment created successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $patientTreatment = PatientTreatment::findOrFail($id);
        $patientTreatment->delete();

        return redirect()->route('dashboard.patient-treatments.index')->with('success', 'Treatment deleted successfully.');
    }
}

