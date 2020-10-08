<?php

namespace App\Policies;

use App\Models\Delivery;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeliveryPolicy
{
    use HandlesAuthorization;

    /**
     * create new delivery
     *
     * @param User $user
     * @return boolean
     */
    public function create(User $user) {
        return $user->role == User::SiteUSER;
    }


    /**
     * just owner of the delivery and admin users can manage the deliveries
     *
     * @param User $user
     * @param Delivery $delivery
     * @return boolean
     */
    public function manage(User $user,Delivery $delivery) {
        return $user->is($delivery->owner) || $user->role == User::ADMIN || $user->role == User::USER;
    }
}
