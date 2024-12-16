<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Models\MedicineCategory;

class MedicineController extends Controller
{
    /**
     * Display a listing of the medicines.
     */
    public function index()
    {
        $searchTerm = '';
        $medicines = Medicine::with('category')->get();
        return view('dashboard.medicine.index', compact('medicines', 'searchTerm'));
    }

    /**
     * Show the form for creating a new medicine.
     */
    public function create()
    {
        $categories = MedicineCategory::all();
        return view('dashboard.medicine.store', compact('categories'));
    }

    /**
     * Store a newly created medicine in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'medicine_category_id' => 'required|exists:medicine_categories,id',
            'manufacturer' => 'nullable|string|max:255',
            'dosage_form' => 'required|string|max:255',
            'strength' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Medicine::create($validated);

        return redirect()->route('dashboard.medicines.index')->with('success', 'Medicine created successfully!');
    }

    /**
     * Display the specified medicine.
     */
    public function show(Medicine $medicine)
    {
        return view('dashboard.medicine.show', compact('medicine'));
    }

    /**
     * Show the form for editing the specified medicine.
     */
    public function edit(Medicine $medicine)
    {
        $categories = MedicineCategory::all();
        return view('dashboard.medicine.edit', compact('medicine', 'categories'));
    }

    /**
     * Update the specified medicine in storage.
     */
    public function update(Request $request, Medicine $medicine)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'medicine_category_id' => 'required|exists:medicine_categories,id',
            'manufacturer' => 'nullable|string|max:255',
            'dosage_form' => 'required|string|max:255',
            'strength' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $medicine->update($validated);

        return redirect()->route('dashboard.medicines.index')->with('success', 'Medicine updated successfully!');
    }

    /**
     * Remove the specified medicine from storage.
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return redirect()->route('dashboard.medicines.index')->with('success', 'Medicine deleted successfully!');
    }
}
