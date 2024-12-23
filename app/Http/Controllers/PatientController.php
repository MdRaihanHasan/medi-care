<?php

namespace App\Http\Controllers;

use App\Models\Patient;
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
}
