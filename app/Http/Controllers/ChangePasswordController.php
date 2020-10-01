<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller {
    public function index() {
        return view('auth.changePassword');
    }

    public function store(UserRequest $request) {

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->password)]);

        return redirect()->refresh()->with('success','Your password changed successfully');
    }
}
