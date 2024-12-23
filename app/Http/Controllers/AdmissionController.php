<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Guardian;
use App\Models\Admission;
use App\Models\Ward;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdmissionController extends Controller
{
    /**
     * Display the list of all admissions.
     */
    public function index()
    {
        $searchTerm = '';
        // Retrieve all admissions (or paginate them)
        $admissions = Admission::with('patient.guardians')->get();
        return view('dashboard.admissions.index', compact('admissions', 'searchTerm'));
    }

    /**
     * Show the form to create a new admission.
     */
    public function create()
    {
        // Retrieve the patient
        $patients = Patient::all();

        // Retrieve all wards and rooms for the dropdown lists
        $wards = Ward::all();
        $rooms = Room::all();

        // Return a view with the patient details and available wards/rooms
        return view('dashboard.admissions.store', compact('patients', 'wards', 'rooms'));
    }

    /**
     * Store a newly created admission record.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the incoming request data
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'admission_reason' => 'required|string',
            'admission_date' => 'required',
            'ward_id' => 'nullable|exists:wards,id',
            'room_id' => 'nullable|exists:rooms,id',
            'guardian_first_name' => 'string',
            'guardian_last_name' => 'nullable|string',
            'guardian_relationship' => 'nullable|string',
            'guardian_phone' => 'nullable|string',
            'guardian_email' => 'nullable',
        ]);

        // Retrieve the patient
        $patient = Patient::findOrFail($request->patient_id);

        // Create a new guardian record for the patient
        $guardian = $patient->guardians()->create([
            'first_name' => $request->guardian_first_name,
            'last_name' => $request->guardian_last_name,
            'relationship' => $request->guardian_relationship,
            'mobile' => $request->guardian_phone,
            'email' => $request->guardian_email,
        ]);

        // Create a new admission record for the patient
        $admission = new Admission([
            'admission_reason' => $request->admission_reason,
            'admission_date' => $request->admission_date,
            'ward_id' => $request->ward_id, // Optional, if assigned
            'room_id' => $request->room_id, // Optional, if assigned
        ]);

        // Save the admission record for the patient
        $patient->admission()->save($admission);

        // Return a success response or redirect
        return redirect()->route('dashboard.admissions.index')
                         ->with('success', 'Inpatient admitted successfully!');
    }

    /**
     * Display the details of a specific admission.
     */
    public function show($id)
    {
        // Retrieve the admission
        $admission = Admission::findOrFail($id);
        return view('dashboard.admissions.show', compact('admission'));
    }

    /**
     * Show the form to edit a specific admission.
     */
    public function edit($id)
    {
        // Retrieve the admission
        $admission = Admission::findOrFail($id);

        // Retrieve all wards and rooms for the dropdown lists
        $wards = Ward::all();
        $rooms = Room::all();

        // Return the view to edit the admission
        return view('dashboard.admissions.edit', compact('admission', 'wards', 'rooms'));
    }

    /**
     * Update a specific admission record.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'admission_reason' => 'required|string',
            'admission_date' => 'required|date',
            'ward_id' => 'nullable|exists:wards,id',
            'room_id' => 'nullable|exists:rooms,id',
        ]);

        // Retrieve the admission
        $admission = Admission::findOrFail($id);

        // Update the admission record
        $admission->update([
            'admission_reason' => $request->admission_reason,
            'admission_date' => $request->admission_date,
            'ward_id' => $request->ward_id, // Optional, if assigned
            'room_id' => $request->room_id, // Optional, if assigned
        ]);

        // Return a success response or redirect
        return redirect()->route('dashboard.admissions.index')
                         ->with('success', 'Admission updated successfully!');
    }

    /**
     * Remove a specific admission record.
     */
    public function destroy($id)
    {
        // Retrieve the admission
        $admission = Admission::findOrFail($id);

        // Delete the admission record
        $admission->delete();

        // Return a success response or redirect
        return redirect()->route('dashboard.admissions.index')
                         ->with('success', 'Admission deleted successfully!');
    }
}
