<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $searchTerm = '';
        $services = Service::all();
        return view('dashboard.services.index', compact('services', 'searchTerm'));
    }

    public function create()
    {
        return view('dashboard.services.store');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:services,name',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        Service::create($validated);

        return redirect()->route('dashboard.services.index')->with('success', 'Service created successfully.');
    }

    public function destroy($id)
    {
        $patient = Service::findOrFail($id);
        $patient->delete();

        return redirect()->route('dashboard.services.index')->with('success', 'Service deleted successfully!');
    }

}

