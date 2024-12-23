<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\PatientServiceSchedule;

class PatientServiceScheduleController extends Controller
{
    public function index()
    {
        $searchTerm = "";
        $schedules = PatientServiceSchedule::with('service', 'patient')->get();
        // dd($schedules);
        return view('dashboard.patient_service_schedules.index', compact('schedules', 'searchTerm'));
    }

    public function create()
    {
        $services = Service::all();
        $patients = Patient::all();
        return view('dashboard.patient_service_schedules.store', compact('services', 'patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'patient_id' => 'required|exists:patients,id',
            'patient_type' => 'required|in:indoor,outdoor',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'status' => 'required|string',
        ]);

        PatientServiceSchedule::create($request->all());
        return redirect()->route('dashboard.patient_service_schedules.index')->with('success', 'Schedule added successfully!');
    }

    public function edit(PatientServiceSchedule $patientServiceSchedule)
    {
        $services = Service::all();
        $patients = Patient::all();
        return view('dashboard.patient_service_schedules.edit', compact('patientServiceSchedule', 'services', 'patients'));
    }

    public function update(Request $request, PatientServiceSchedule $patientServiceSchedule)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'patient_id' => 'required|exists:patients,id',
            'patient_type' => 'required|in:indoor,outdoor',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'status' => 'required|string',
        ]);

        $patientServiceSchedule->update($request->all());
        return redirect()->route('dashboard.patient_service_schedules.index')->with('success', 'Schedule updated successfully!');
    }

    public function destroy(PatientServiceSchedule $patientServiceSchedule)
    {
        $patientServiceSchedule->delete();
        return redirect()->route('dashboard.patient_service_schedules.index')->with('success', 'Schedule deleted successfully!');
    }
}
