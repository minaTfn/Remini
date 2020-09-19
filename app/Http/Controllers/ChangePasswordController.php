<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller {
    public function index() {
        return view('auth.changePassword');
    }

    public function store(Request $request) {
        $request->validate([
            'old-password' => ['required',new MatchOldPassword],
            'password' => [
                'required',
                'string',
                'confirmed',
                'min:6',
                'regex:/[a-z]/',      // must contain at least one  lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
            ]
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->password)]);

        return redirect()->refresh()->with('success','Your password changed successfully');
    }
}
