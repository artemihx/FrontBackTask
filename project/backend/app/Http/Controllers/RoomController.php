<?php

namespace App\Http\Controllers;

use App\Models\HotelRoom;
use App\Models\RoomEquipment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = HotelRoom::query();
        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price', [$request->input('min_price'), $request->input('max_price')]);
        }
        if ($request->has('area')) {
            $query->whereRaw('width * length = ?', [$request->input('area')]);
        }
        if ($request->has('equipment')) {
            $equipmentIds = $request->input('equipment');
            $query->whereHas('equipment', function ($q) use ($equipmentIds) {
                $q->whereIn('room_equipment.id', $equipmentIds);
            });
        }
        if ($request->has('on_main')) {
            $query->where('on_main', $request->input('on_main'));
        }

        $sortBy = $request->input('sort_by', 'price');
        $sortOrder = $request->input('sort_order', 'asc');
        $query->orderBy($sortBy, $sortOrder);

        $rooms = $query->with(['equipment', 'photos'])->get();

        return new JsonResponse($rooms, 200);
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
}
