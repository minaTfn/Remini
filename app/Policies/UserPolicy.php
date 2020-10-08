<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


    /**
     * manage all the actions in user CRUD.
     *
     * @param User $user
     * @return boolean
     */
    public function manage(User $user) {
        return $user->role == User::ADMIN;
    }

    public function deleteItself(User $user, User $userItself) {
        return $user->isNot($userItself);
    }
}
