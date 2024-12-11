<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReviewPolicy
{

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Review $review): Response
    {
        return $user->id === $review->user_id
            ? Response::allow()
            : Response::deny('You are not allowed to update this review.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Review $review): Response
    {
        return $user->id === $review->user_id
            ? Response::allow()
            : Response::deny('You are not allowed to delete this review.');
    }

}
