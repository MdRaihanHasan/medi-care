<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Ward;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // Show all rooms
    public function index()
    {
        $searchTerm = ''; // Initialize search term
        $rooms = Room::with('ward')->get(); // Fetch all rooms with their wards
        return view('dashboard.rooms.index', compact('rooms', 'searchTerm')); // Return the rooms to a view
    }

    // Show the form to create a room
    public function create()
    {
        $wards = Ward::all(); // Fetch all wards for the dropdown
        return view('dashboard.rooms.store', compact('wards')); // Return a form view
    }

    // Store a newly created room in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_number' => 'required|unique:rooms|max:255',
            'ward_id' => 'required|exists:wards,id',
            'beds' => 'required|integer|min:1',
            'type' => 'required|in:General,Private,ICU',
        ]);

        Room::create($validated); // Create a new room with validated data

        return redirect()->route('dashboard.rooms.index')->with('success', 'Room created successfully!');
    }

    public function destroy($id)
    {
        $patient = Room::findOrFail($id);
        $patient->delete();

        return redirect()->route('dashboard.rooms.index')->with('success', 'Rooms deleted successfully!');
    }
}
