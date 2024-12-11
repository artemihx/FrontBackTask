<?php

namespace App\Http\Controllers;

use App\Http\Actions\AddBookingAction;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\HotelRoom;
use App\Models\Pet;
use App\Models\Room;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\JsonException;

class BookingController extends Controller
{
    // Получить список всех бронирований для текущего пользователя
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())->with('room', 'pets')->get();
        return response()->json($bookings);
    }

    // Создать новое бронирование
    public function store(BookingRequest $request)
    {
        $response = AddBookingAction::execute($request);
        return response()->json($response, 201);
    }

    // Удалить бронирование
    public function destroy(Booking $booking)
    {
        Gate::authorize('delete', $booking);
        if(!$booking->status)
        {
            $booking->delete();
            return response()->json(['message' => 'Бронирование успешно удалено.']);
        }
        return response()->json(['message' => 'Бронивароние уже одобрено!']);
    }
}
