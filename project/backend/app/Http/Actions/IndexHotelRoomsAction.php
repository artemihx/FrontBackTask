<?php

namespace App\Http\Actions;

use App\Http\Requests\IndexHotelRoomRequest;
use App\Models\HotelRoom;
use Illuminate\Http\JsonResponse;

class IndexHotelRoomsAction
{
public static function execute(IndexHotelRoomRequest $request)
{
    $query = HotelRoom::query();

    if ($request->has('min_price')) {
        $query->where('price', '>=', $request->min_price);
    }
    if ($request->has('max_price')) {
        $query->where('price', '<=', $request->max_price);
    }

    if ($request->has('area')) {
        $areas = $request->input('area');
        $query->where(function ($query) use ($areas) {
            foreach ($areas as $area) {
                $query->orWhereRaw('width * length = ?', [$area]);
            }
        });
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

        return $rooms;
    }
}
