<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @param Country $country
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $cities = City::where('country_id', $request->country_id)->get()->pluck('title', 'id');
        return response()->json([
            'data' => $cities
        ]);
    }
}
