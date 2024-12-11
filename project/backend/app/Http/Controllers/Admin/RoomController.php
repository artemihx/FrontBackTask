<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelRoomRequest;
use App\Models\HotelRoom;
use App\Models\HotelRoomEquipment;
use App\Models\RoomEquipment;
use App\Models\RoomPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function store(HotelRoomRequest $request)
    {
        $room = HotelRoom::create($request->validated());
        return response()->json($room, 201);
    }

    public function update(HotelRoomRequest $request, HotelRoom $room)
    {
        $room->update($request->validated());
        return response()->json($room);
    }

    public function delete(HotelRoom $room)
    {
        $room->delete();
        return response()->json(['message' => 'Room deleted successfully']);
    }

    public function addPhoto(HotelRoom $room, Request $request)
    {
        $photo = $request->file('photo');
        $path = 'rooms/' . $photo->hashName();
        Storage::disk('public')->put($path, file_get_contents($photo));
        $photoUrl = Storage::disk('public')->url($path);
        $room->photos()->create(['photo' => $photoUrl]);
        return response()->json($photoUrl);
    }

    public function deletePhoto(RoomPhoto $photo)
    {
        Storage::disk('public')->delete($photo);
        $photo->delete();
        return response()->json(['message' => 'photo deleted successfully']);
    }

    public function addEquipments(HotelRoom $room, RoomEquipment $equipment)
    {
        $roomEquipment = HotelRoomEquipment::where('hotel_room_id', $room->id)
            ->where('equipment_id', $equipment->id)
            ->first();

        if ($roomEquipment) {
            return response()->json(['error' => 'Equipment is already associated with this room'], 422);
        }
        HotelRoomEquipment::create([
           'hotel_room_id' => $room->id,
           'equipment_id' => $equipment->id,
        ]);

        return response()->json($room->load('equipment'));
    }

    public function deleteEquipment(HotelRoom $room ,RoomEquipment $equipment)
    {
        $roomEquipment = HotelRoomEquipment::where('hotel_room_id', $room->id)
            ->where('equipment_id', $equipment->id)
            ->first();
        if(!$roomEquipment){
            return response()->json(['error' => 'Equipment not found'], 404);
        }
        $roomEquipment->delete();
        return response()->json(['message' => 'Equipment deleted successfully']);
    }
}
