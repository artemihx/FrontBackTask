<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return response()->json(Room::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'type' => 'required|string|max:255',
        ]);

        $room = Room::create([
            'name' => $validated['name'],
            'capacity' => $validated['capacity'],
            'type' => $validated['type'],
        ]);

        return response()->json($room, 201);
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'capacity' => 'nullable|integer',
            'type' => 'nullable|string|max:255',
        ]);

        $room->update($validated);

        return response()->json($room);
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return response()->json(['message' => 'Room deleted successfully']);
    }
}
