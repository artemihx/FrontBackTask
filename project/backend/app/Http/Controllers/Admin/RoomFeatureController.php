<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomEquipmentRequest;
use App\Models\RoomEquipment;
use App\Models\RoomFeature;
use Illuminate\Http\Request;

class RoomFeatureController extends Controller
{
    public function index()
    {
        return response()->json(RoomEquipment::all());
    }

    public function store(RoomEquipmentRequest $request)
    {

        $roomFeature = RoomEquipment::create($request->validated());
        return response()->json($roomFeature, 201);
    }

    public function update(RoomEquipmentRequest $request, RoomEquipment $equipment)
    {

        $equipment->update($request->validated());

        return response()->json($equipment, 201);
    }

    public function delete(RoomEquipment $equipment)
    {
        $equipment->delete();
        return response()->json(['message' => 'Room equipment deleted successfully']);
    }
}
