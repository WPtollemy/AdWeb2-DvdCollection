<?php

namespace App\Policies;

use App\User;
use App\Dvd;
use Illuminate\Auth\Access\HandlesAuthorization;

class DvdPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the dvd.
     *
     * @param  \App\User  $user
     * @param  \App\Dvd  $dvd
     * @return mixed
     */
    public function update(User $user, Dvd $dvd)
    {
        return $dvd->ownerId == $user->id;
    }
}
