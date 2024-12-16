<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicineCategory;

class MedicineCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $searchTerm = '';
        $categories = MedicineCategory::all();
        return view('dashboard.medicine_category.index', compact('categories', 'searchTerm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.medicine_category.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:medicine_categories|max:255',
            'description' => 'nullable|string',
        ]);

        MedicineCategory::create($validated);

        return redirect()->route('dashboard.medicine-categories.index')->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicineCategory $medicineCategory)
    {
        return view('dashboard.medicine_category.show', compact('medicineCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicineCategory $medicineCategory)
    {
        return view('dashboard.medicine_category.edit', compact('medicineCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedicineCategory $medicineCategory)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|unique:medicine_categories,name,' . $medicineCategory->id,
            'description' => 'nullable|string',
        ]);

        $medicineCategory->update($validated);

        return redirect()->route('dashboard.medicine-categories.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicineCategory $medicineCategory)
    {
        $medicineCategory->delete();

        return redirect()->route('dashboard.medicine-categories.index')->with('success', 'Category deleted successfully!');
    }
}
