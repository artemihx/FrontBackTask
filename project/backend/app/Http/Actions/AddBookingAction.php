<?php

namespace App\Http\Actions;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\HotelRoom;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class AddBookingAction
{
    public static function execute(BookingRequest $request)
    {
        $room = HotelRoom::find($request->room_id);

        // Проверяем, свободен ли номер в указанные даты
        $overlappingBookings = Booking::where('room_id', $room->id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                    ->orWhere(function ($query) use ($request) {
                        $query->where('start_date', '<=', $request->start_date)
                            ->where('end_date', '>=', $request->end_date);
                    });
            })->exists();

        if ($overlappingBookings) {
            return response()->json(['message' => 'Номер уже забронирован на указанные даты.'], 422);
        }

        $booking = Booking::create([
            'user_id' => auth()->user()->id,
            'room_id' => $request->room_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        foreach ($request->pet_name as $petName) {
            Pet::create([
                'booking_id' => $booking->id,
                'name' => $petName,
            ]);
        }

        return response()->json(['message' => 'Бронирование успешно создано!', 'booking' => $booking], 201);
    }
}
