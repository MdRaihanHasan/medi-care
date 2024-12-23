<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HospitalCharge;

class HospitalChargeController extends Controller
{
    public function index()
    {
        $searchTerm = '';
        $charges = HospitalCharge::all();
        return view('dashboard.hospital_charges.index', compact('charges', 'searchTerm'));
    }

    public function create()
    {
        return view('dashboard.hospital_charges.store');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        HospitalCharge::create($request->all());

        return redirect()->route('dashboard.hospital-charge.index')->with('success', 'Hospital charge added successfully.');
    }

    public function edit(HospitalCharge $hospitalCharge)
    {
        return view('dashboard.hospital_charges.edit', compact('hospitalCharge'));
    }

    public function update(Request $request, HospitalCharge $hospitalCharge)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $hospitalCharge->update($request->all());

        return redirect()->route('dashboard.hospital_charges.index')->with('success', 'Hospital charge updated successfully.');
    }

    public function destroy(HospitalCharge $hospitalCharge)
    {
        $hospitalCharge->delete();

        return redirect()->route('dashboard.hospital_charges.index')->with('success', 'Hospital charge deleted successfully.');
    }
}
