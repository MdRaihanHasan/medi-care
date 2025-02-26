<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appoinment;
use App\Models\DoctorInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AppoinmentController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');

        $appointments = Appoinment::with('patient', 'doctor')
    ->when($searchTerm, function ($query) use ($searchTerm) {
        return $query->where(function ($q) use ($searchTerm) {
            // Search by patient name
            $q->whereHas('patient', function ($query) use ($searchTerm) {
                $query->where('first_name', 'like', "%{$searchTerm}%")
                    ->orWhere('last_name', 'like', "%{$searchTerm}%");
            })
            // Search by doctor name
            ->orWhereHas('doctor', function ($query) use ($searchTerm) {
                $query->where('first_name', 'like', "%{$searchTerm}%")
                    ->orWhere('last_name', 'like', "%{$searchTerm}%");
            })
            // Search by appointment type (indoor or outdoor)
            ->orWhere('appointment_type', 'like', "%{$searchTerm}%");
        });
    })
    ->get();


        return view('dashboard.appoinments.index', compact('appointments', 'searchTerm'));
    }

    public function create() {
        $patients = Patient::all();
        $doctors = Doctor::all();

        return view('dashboard.appoinments.store', compact('patients', 'doctors'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string',
            'mobile' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'appointment_date' => 'required',
            'appointment_from' => 'required',
            'appointment_to' => 'required',
            'doctor_id' => 'required|exists:doctors,id',
            'notes' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'appointment_type' => 'required|string',
            'bill_status' => 'required|string',
        ]);

        // Check if an existing patient was selected
        $patient = null;
        if ($request->has('existing_patient_id') && $request->existing_patient_id) {
            $patient = Patient::find($request->existing_patient_id);
        } else {
            // Create a new patient record
            $patient = new Patient();
            $patient->first_name = $request->first_name;
            $patient->last_name = $request->last_name;
            $patient->gender = $request->gender;
            $patient->mobile = $request->mobile;
            $patient->email = $request->email;
            $patient->address = $request->address;


            if($request->hasFile('avatar')){
                $file = $request->file('avatar');
                $fileName = $file->getClientOriginalName();
                $random = random_int(111111111, 999999999);
                $file = $file->move(storage_path() . "/app/public/avatars/" , $random.'_'.$fileName);
                $patient->avatar = $random.'_'.$fileName;
            }

            $patient->save();
        }

        // Store appointment details
        $appointment = new Appoinment();
        $appointment->patient_id = $patient->id;
        $appointment->appointment_date = $request->appointment_date;
        $appointment->appointment_from = $request->appointment_from;
        $appointment->appointment_to = $request->appointment_to;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->notes = $request->notes;
        $appointment->appointment_type = $request->appointment_type;
        $appointment->bill_status = $request->bill_status;
        $appointment->save();

        return redirect()->route('dashboard.appoinment')->with('success', 'Appointment created successfully!');
    }




    /**
     * Remove the specified doctor from storage.
     */

    public function destroy($id)
    {
        $patient = Appoinment::findOrFail($id);
        $patient->delete();

        return redirect()->route('dashboard.appoinment')->with('success', 'Appoinment deleted successfully!');
    }




}
