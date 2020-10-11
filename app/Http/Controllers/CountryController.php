<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index() {
        $countries = Country::get()->pluck('title', 'id');
        return response()->json([
            'data' => $countries
        ]);
    }
}
