<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Получить список всех бронирований для текущего пользователя
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())->with('room')->get();
        return response()->json($bookings);
    }

    // Создать новое бронирование
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $room = Room::find($request->room_id);

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
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json(['message' => 'Бронирование успешно создано!', 'booking' => $booking], 201);
    }

    // Удалить бронирование
    public function destroy($id)
    {
        $booking = Booking::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$booking) {
            return response()->json(['message' => 'Бронирование не найдено.'], 404);
        }

        $booking->delete();

        return response()->json(['message' => 'Бронирование успешно удалено.']);
    }
}
