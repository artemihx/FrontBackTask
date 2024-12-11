<?php

namespace App\Policies;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BookingPolicy
{

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Booking $booking): Response
    {
        return ($user->id === $booking->user_id)
            ? Response::allow()
            : Response::deny('You are not allowed to delete this booking.');
    }

}
