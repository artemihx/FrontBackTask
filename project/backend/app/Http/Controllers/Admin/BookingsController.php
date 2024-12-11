<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return response()->json($bookings);
    }

    public function delete(Booking $booking)
    {
        $booking->delete();
        return response()->json(['message' => 'Booking has been deleted']);
    }

    public function accept(Booking $booking)
    {
        $booking->update(['status' => true]);
        return response()->json(['message' => 'Booking has been accepted']);
    }
}
