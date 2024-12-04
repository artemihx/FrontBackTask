<?php

namespace App\Http\Controllers;

use App\Models\HotelRoom;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(): JsonResponse
    {
        $rooms = HotelRoom::all();
        return new JsonResponse($rooms, 200);
    }

    public function show(HotelRoom $room): JsonResponse
    {
        return new JsonResponse($room, 200);
    }
}
