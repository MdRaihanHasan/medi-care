<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Room;
use Illuminate\Http\Request;

class BedController extends Controller
{
    /**
     * Display a listing of the beds.
     */
    public function index()
    {
        $searchTerm = '';
        $beds = Bed::with('room')->get(); // Fetch all beds with room data
        return view('dashboard.beds.index', compact('beds', 'searchTerm')); // Use the correct path
    }

    /**
     * Show the form for creating a new bed.
     */
    public function create()
    {
        $rooms = Room::all(); // Get all rooms
        return view('dashboard.beds.store', compact('rooms')); // Use the correct path
    }

    /**
     * Store a newly created bed in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'bed_number' => 'required|unique:beds,bed_number',
            'status' => 'required|in:available,occupied,maintenance',
        ]);

        Bed::create($request->all());

        return redirect()->route('dashboard.beds.index')->with('success', 'Bed created successfully.');
    }

    /**
     * Show the form for editing a bed.
     */
    public function edit(Bed $bed)
    {
        $rooms = Room::all();
        return view('dashboard.beds.edit', compact('bed', 'rooms')); // Use the correct path
    }

    /**
     * Update the specified bed in the database.
     */
    public function update(Request $request, Bed $bed)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'bed_number' => "required|unique:beds,bed_number,{$bed->id}",
            'status' => 'required|in:available,occupied,maintenance',
        ]);

        $bed->update($request->all());

        return redirect()->route('dashboard.beds.index')->with('success', 'Bed updated successfully.');
    }

    /**
     * Remove the specified bed from the database.
     */
    public function destroy(Bed $bed)
    {
        $bed->delete();
        return redirect()->route('dashboard.beds.index')->with('success', 'Bed deleted successfully.');
    }
}
