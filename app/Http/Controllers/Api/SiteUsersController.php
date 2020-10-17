<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteUsersController extends Controller {

    public function index(Request $request) {

        $users = User::site()->where('name', 'like', "%{$request->name}%")->get()->pluck('name', 'id');

        return response()->json([
            'data' => $users ?: []
        ]);
    }

    public function show(Request $request) {

        $user = User::site()->find($request->id);

        return response()->json([
            'data' => $user ? [$user->id => $user->name] : []
        ]);

    }


}
