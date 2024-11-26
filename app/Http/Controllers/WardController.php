<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use Illuminate\Http\Request;

class WardController extends Controller
{
    // Show all wards
    public function index()
    {
        $searchTerm = ''; // Initialize search term
        $wards = Ward::all(); // Fetch all wards
        return view('dashboard.wards.index', compact('wards', 'searchTerm')); // Return the wards to a view
    }

    // Show the form to create a ward
    public function create()
    {
        return view('dashboard.wards.store'); // Return a form view
    }

    // Store a newly created ward in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'capacity' => 'required|integer|min:1',
        ]);

        Ward::create($validated);

        return redirect()->route('dashboard.wards.index')->with('success', 'Ward created successfully!');
    }

    public function destroy($id)
    {
        $patient = Ward::findOrFail($id);
        $patient->delete();

        return redirect()->route('dashboard.wards.index')->with('success', 'Ward deleted successfully!');
    }
}

