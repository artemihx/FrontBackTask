<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomFeature;
use Illuminate\Http\Request;

class RoomFeatureController extends Controller
{
    public function index()
    {
        return response()->json(RoomFeature::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'feature_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $roomFeature = RoomFeature::create([
            'room_id' => $validated['room_id'],
            'feature_name' => $validated['feature_name'],
            'description' => $validated['description'] ?? null,
        ]);

        return response()->json($roomFeature, 201);
    }

    public function update(Request $request, $id)
    {
        $roomFeature = RoomFeature::findOrFail($id);

        $validated = $request->validate([
            'room_id' => 'nullable|exists:rooms,id',
            'feature_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $roomFeature->update($validated);

        return response()->json($roomFeature);
    }

    public function destroy($id)
    {
        $roomFeature = RoomFeature::findOrFail($id);
        $roomFeature->delete();

        return response()->json(['message' => 'Room feature deleted successfully']);
    }
}
