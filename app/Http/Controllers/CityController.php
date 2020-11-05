<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller {
    /**
     * Display an array of the cities based on cityId => title.
     * Used in vueJS
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $cities = City::where('country_id', $request->country_id)->get()->pluck('title', 'id');
        return response()->json([
            'data' => $cities
        ]);
    }

    /**
     * Display a listing of the resource.
     * Used in reactJS
     *
     * @param Country $country
     * @return \Illuminate\Http\Response
     */
    public function list(Country $country) {

        $cities = $country->cities;
        if(request()->has('q')){
            $q = request()->input('q');
            $cities = $country->cities()->where('title','like',$q."%")->get();
        }
        return response()->json([
            'data' => \App\Http\Resources\City::collection($cities)
        ]);
    }
}
