<?php

namespace App\Http\Controllers;

use App\Http\Actions\IndexHotelRoomsAction;
use App\Http\Requests\IndexHotelRoomRequest;
use App\Models\HotelRoom;
use App\Models\RoomEquipment;
use Cassandra\Index;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index(IndexHotelRoomRequest $request): JsonResponse
    {
        $rooms = IndexHotelRoomsAction::execute($request);
        return response()->json($rooms, 200);
    }
    public function show(HotelRoom $room): JsonResponse
    {
        $room->load(['equipment', 'photos']);
        return new JsonResponse($room, 200);
    }

    public function roomPhotos(HotelRoom $room)
    {
        $photos = $room->load(['photos']);
        return response()->json($room->photos);
    }
    public function getFilters()
    {
        $rooms = HotelRoom::all();

        $minPrice = HotelRoom::min('price');
        $maxPrice = HotelRoom::max('price');
        $areas = $rooms->unique('area')->pluck('area');
        $equipments = RoomEquipment::all();

        $filters = [
            'min_price' => $minPrice,
            'max_price' => $maxPrice,
            'areas' => $areas,
            'equipments' => $equipments,
        ];
        return new JsonResponse($filters, 200);
    }

    public function getRandomRooms()
    {
        $rooms = HotelRoom::inRandomOrder()->take(3)->get();
        return response()->json($rooms, 200);
    }
}
