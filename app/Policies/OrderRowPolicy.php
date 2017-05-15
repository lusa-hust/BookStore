<?php

namespace App\Policies;

use App\User;
use App\OrderRow;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderRowPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the orderRow.
     *
     * @param  \App\User  $user
     * @param  \App\OrderRow  $orderRow
     * @return mixed
     */
    public function update(User $user, OrderRow $orderRow)
    {
        return $user->id === $orderRow->order->user_id;
    }

    /**
     * Determine whether the user can delete the orderRow.
     *
     * @param  \App\User  $user
     * @param  \App\OrderRow  $orderRow
     * @return mixed
     */
    public function delete(User $user, OrderRow $orderRow)
    {
        return $user->id === $orderRow->order->user_id;
    }
}
