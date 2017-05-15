<?php

namespace App\Policies;

use App\User;
use App\Review;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
{
    use HandlesAuthorization;


    public function before(User $user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the review.
     *
     * @param  \App\User $user
     * @param  \App\Review $review
     * @return mixed
     */
    public function update(User $user, Review $review)
    {

        return $user->id === $review->user_id;

    }

    /**
     * Determine whether the user can delete the review.
     *
     * @param  \App\User $user
     * @param  \App\Review $review
     * @return mixed
     */
    public function delete(User $user, Review $review)
    {
        return $user->id === $review->user_id;
    }
}
