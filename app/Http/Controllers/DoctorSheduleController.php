<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\DoctorShedule;

class DoctorSheduleController extends Controller
{
    public function index() {
        // $doctors = Doctor::with('doctorInfo')->get();
        $schedules = DoctorShedule::with('doctor')->get(); // Fetch schedules with doctor details
        // $doctor_i = Doctor::with('doctorInfo')->get();
        return view('dashboard.doctor_schedules.index', compact('schedules'));
    }

    public function create() {
        $doctors = Doctor::with('doctorInfo')->get();
        return view('dashboard.doctor_schedules.store', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'department' => 'required',
            'available_days' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required',
        ]);

        DoctorShedule::create([
            'doctor_id' => $request->doctor_id,
            'department' => $request->department,
            'available_days' => $request->available_days,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'notes' => $request->notes,
            'status' => $request->status,
        ]);

        return redirect()->route('dashboard.schedule')->with('success', 'Schedule created successfully');
    }

    public function edit($id)
    {
        $schedule = DoctorShedule::findOrFail($id);
        $doctors = Doctor::all();
        return view('dashboard.schedule.store', compact('schedule', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_id' => 'required',
            'department' => 'required',
            'available_days' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required',
        ]);

        $schedule = DoctorShedule::findOrFail($id);
        $schedule->update([
            'doctor_id' => $request->doctor_id,
            'department' => $request->department,
            'available_days' => $request->available_days,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'notes' => $request->notes,
            'status' => $request->status,
        ]);

        return redirect()->route('dashboard.schedule', $id)->with('success', 'Schedule updated successfully');
    }

    public function destroy($id)
    {
        $schedule = DoctorShedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('schedule.index')->with('success', 'Schedule deleted successfully');
    }

}
