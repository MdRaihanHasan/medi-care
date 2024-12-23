<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceSchedule;

class ServiceScheduleController extends Controller
{
    /**
     * Display a listing of the service schedules.
     */
    public function index()
    {
        $searchTerm = '';
        $schedules = ServiceSchedule::with('service')->get();
        return view('dashboard.service_schedules.index', compact('schedules', 'searchTerm'));
    }

    /**
     * Show the form for creating a new service schedule.
     */
    public function create()
    {
        $services = Service::all(); // Fetch all available services
        return view('dashboard.service_schedules.store', compact('services'));
    }

    /**
     * Store a newly created service schedule in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'date' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required|string',
        ]);

        ServiceSchedule::create($request->all());

        return redirect()->route('dashboard.service_schedules.index')->with('success', 'Service schedule created successfully.');
    }

    /**
     * Display the specified service schedule.
     */
    public function show(ServiceSchedule $serviceSchedule)
    {
        return view('dashboard.service_schedules.show', compact('serviceSchedule'));
    }

    /**
     * Show the form for editing the specified service schedule.
     */
    public function edit(ServiceSchedule $serviceSchedule)
    {
        $services = Service::all();
        return view('dashboard.service_schedules.edit', compact('serviceSchedule', 'services'));
    }

    /**
     * Update the specified service schedule in storage.
     */
    public function update(Request $request, ServiceSchedule $serviceSchedule)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'status' => 'required|string',
        ]);

        $serviceSchedule->update($request->all());

        return redirect()->route('dashboard.service_schedules.index')->with('success', 'Service schedule updated successfully.');
    }

    /**
     * Remove the specified service schedule from storage.
     */
    public function destroy(ServiceSchedule $serviceSchedule)
    {
        $serviceSchedule->delete();

        return redirect()->route('dashboard.service_schedules.index')->with('success', 'Service schedule deleted successfully.');
    }
}
