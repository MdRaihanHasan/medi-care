<?php

namespace App\Http\Controllers;

use App\Models\Appoinment;
use App\Models\cr;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        $appoinments = Appoinment::all();
        return view('dashboard.index', compact('doctors', 'patients', 'appoinments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cr $cr)
    {
        //
    }
}
