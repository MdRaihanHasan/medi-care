<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');

        $doctors = Doctor::with('doctorInfo')->when($searchTerm, function ($query) use ($searchTerm) {
            return $query->where('first_name', 'like', "%{$searchTerm}%")->orWhere('last_name', 'like', "%{$searchTerm}%");
        })->get();

        return view('dashboard.doctors.index', compact('doctors', 'searchTerm'));
    }

    public function create() {
        return view('dashboard.doctors.store');
    }

    public function profile($id) {
        // Retrieve the doctor and related info using the ID
        $doctor = Doctor::with('doctorInfo')->findOrFail($id);

        // Pass the doctor data to the profile view
        return view('dashboard.doctors.profile', compact('doctor', 'id'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:doctors,username',
            'mobile' => 'required|string|max:15|unique:doctors,mobile',
            'email' => 'required|email|max:255|unique:doctors,email',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'education' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'biography' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);



        $doctor = Doctor::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => Hash::make(value: now()),
        ]);

        $doctorInfoData = [
            'doctor_id' => $doctor->id,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'education' => $request->education,
            'designation' => $request->designation,
            'department' => $request->department,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'biography' => $request->biography,
            'status' => $request->status,
        ];


        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $fileName = $file->getClientOriginalName();
            $random = random_int(111111111, 999999999);
            $file = $file->move(storage_path() . "/app/public/avatars/" , $random.'_'.$fileName);
            $doctorInfoData['avatar'] = $random.'_'.$fileName;
        }

        DoctorInfo::create(attributes: $doctorInfoData);

        return redirect()->route('dashboard.doctor')->with('success', 'Doctor created successfully.');
    }

    /**
     * Show the form for editing a specific doctor.
     */
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctorInfo = DoctorInfo::where('doctor_id', $id)->firstOrFail();
        // dd('fda');
        return view('dashboard.doctors.store', compact('doctor', 'doctorInfo', 'id'));
    }

    /**
     * Update the specified doctor in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:doctors,username,' . $id,
            'mobile' => 'required|string|max:15|unique:doctors,mobile,' . $id,
            'email' => 'required|email|max:255|unique:doctors,email,' . $id,
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'education' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'biography' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'mobile' => $request->mobile,
            'email' => $request->email,
        ]);

        $doctorInfoData = [
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'education' => $request->education,
            'designation' => $request->designation,
            'department' => $request->department,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'biography' => $request->biography,
            'status' => $request->status,
        ];

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $fileName = $file->getClientOriginalName();
            $random = random_int(111111111, 999999999);
            $file = $file->move(storage_path() . "/app/public/avatars/" , $random.'_'.$fileName);
            $doctorInfoData['avatar'] = $random.'_'.$fileName;
        }

        $doctorInfo = DoctorInfo::where('doctor_id', $doctor->id)->firstOrFail();
        $doctorInfo->update($doctorInfoData);

        return redirect()->route('dashboard.doctor')->with('success', 'Doctor updated successfully.');
    }

    /**
     * Remove the specified doctor from storage.
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctorInfo = DoctorInfo::where('doctor_id', $doctor->id)->firstOrFail();

        // Delete associated records
        $doctorInfo->delete();
        $doctor->delete();

        return redirect()->route('dashboard.doctor')->with('success', 'Doctor deleted successfully.');
    }




}
