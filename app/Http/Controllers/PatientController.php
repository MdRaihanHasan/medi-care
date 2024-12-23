<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Ward;
use App\Models\Patient;
use App\Models\Admission;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');

        $patients = Patient::when($searchTerm, function ($query) use ($searchTerm) {
            return $query->where('first_name', 'like', "%{$searchTerm}%")->orWhere('last_name', 'like', "%{$searchTerm}%");
        })->get();

        return view('dashboard.patients.index', compact('patients', 'searchTerm'));
    }
    public function dis(Request $request)
    {
        $searchTerm = $request->input('search');

        $patients = Patient::where('patient_type',  'indoor')->whereNotNull('discharged_at')->get();
        // dd($patients);

        return view('dashboard.patients.index', compact('patients', 'searchTerm'));
    }
    public function indor(Request $request)
    {
        $searchTerm = $request->input('search');

        $patients = Patient::where('patient_type',  'indoor')->get();
        // dd($patients);

        return view('dashboard.patients.index', compact('patients', 'searchTerm'));
    }
    public function out(Request $request)
    {
        $searchTerm = $request->input('search');

        $patients = Patient::where('patient_type',  'outdoor')->get();
        // dd($patients);

        return view('dashboard.patients.index', compact('patients', 'searchTerm'));
    }

    public function create() {
        return view('dashboard.patients.store');
    }

    public function profile() {
        return view('dashboard.patients.profile');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string',
            'mobile' => 'required|string',
            'email' => 'required|email|unique:patients,email',
            'address' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'patient_type' => 'required',
        ]);

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $fileName = $file->getClientOriginalName();
            $random = random_int(111111111, 999999999);
            $file = $file->move(storage_path() . "/app/public/avatars/" , $random.'_'.$fileName);
            $avatarPath = $random.'_'.$fileName;
        }

        // Save patient details in the database
        Patient::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'address' => $request->address,
            'avatar' => $avatarPath,
            'patient_type' => $request->patient_type,
        ]);

        // Redirect with success message
        return redirect()->route('dashboard.patient')->with('success', 'Patient details saved successfully!');
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('dashboard.patient')->with('success', 'Patient deleted successfully!');
    }

    public function admitInpatient(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'admission_reason' => 'required|string',
            'admission_date' => 'required|date',
            'ward_id' => 'nullable|exists:wards,id',
            'room_id' => 'nullable|exists:rooms,id',
            'guardian_first_name' => 'required|string',
            'guardian_last_name' => 'required|string',
            'guardian_relationship' => 'required|string',
            'guardian_mobile' => 'nullable|string',
            'guardian_email' => 'nullable|email',
        ]);

        // Retrieve the patient
        $patient = Patient::findOrFail($request->patient_id);

        // Create a new guardian record for the patient
        $guardian = $patient->guardians()->create([
            'first_name' => $request->guardian_first_name,
            'last_name' => $request->guardian_last_name,
            'relationship' => $request->guardian_relationship,
            'mobile' => $request->guardian_mobile,
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

        // Return a success response with the patient, guardian, and admission data
        return response()->json([
            'message' => 'Inpatient admitted successfully!',
            'patient' => $patient,
            'guardian' => $guardian,
            'admission' => $admission,
        ]);
    }

    /**
     * Display the patient details and admission form.
     */
    public function showAdmissionForm($id)
    {
        // Retrieve the patient
        $patient = Patient::findOrFail($id);

        // Retrieve all wards and rooms for the dropdown lists
        $wards = Ward::all();
        $rooms = Room::all();

        // Return a view with the patient details and available wards/rooms
        return view('patients.admit', compact('patient', 'wards', 'rooms'));
    }

}
