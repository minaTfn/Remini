<?php

namespace App\Http\Controllers;

use App\Models\Delivery;

class UserFavoriteDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Delivery $delivery
     * @return void
     */
    public function store(Delivery $delivery)
    {
        return $delivery->favoriteToggle();

    }

}
