<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller {
    public function index(Request $request) {
        if (strlen($request->name) < 3) {
            return response()->json([
                'data' => []
            ]);
        }

        $countries = Country::where('title', 'like', "%{$request->name}%")
            ->OrWhere('code', 'like', "%{$request->name}%")
            ->get()
            ->pluck('title', 'id');

        return response()->json([
            'data' => $countries
        ]);
    }

    public function show(Request $request) {

        $country = Country::find($request->id);

        return response()->json([
            'data' => $country ? [$country->id => $country->title] : []
        ]);

    }

}
