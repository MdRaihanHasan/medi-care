<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $searchTerm = '';
        $roomTypes = RoomType::all();
        return view('dashboard.room_types.index', compact('roomTypes', 'searchTerm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.room_types.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:room_types,name',
            'description' => 'nullable|string',
        ]);

        RoomType::create($validated);

        return redirect()->route('dashboard.room-type.index')->with('success', 'Room type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomType $roomType)
    {
        return view('dashboard.room_types.show', compact('roomType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomType $roomType)
    {
        return view('dashboard.room_types.edit', compact('roomType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoomType $roomType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:room_types,name,' . $roomType->id,
            'description' => 'nullable|string',
        ]);

        $roomType->update($validated);

        return redirect()->route('dashboard.room-type.index')->with('success', 'Room type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomType $roomType)
    {
        $roomType->delete();

        return redirect()->route('dashboard.room-type.index')->with('success', 'Room type deleted successfully.');
    }
}
