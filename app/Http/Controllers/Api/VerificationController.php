<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{

    protected $guard = 'api';

//    public function verify($user_id, Request $request) {
////        dd($request);
////        $id = $request->route()->parameter('id');
//        $expires = $request->input('expires');
//        $hash = $request->input('hash');
//        $signature = $request->input('signature');
//        return redirect("http://localhost:3000/confirmation/$user_id?expires=$expires&hash=$hash&signature=$signature");
//
//    }

    public function verify($user_id, Request $request){
        if (!$request->hasValidSignature()) {
            return redirect("http://localhost:3000/confirmation");
//            return response()->json(["message" => "Invalid/Expired url provided."], 401);
        }

        $user = User::findOrFail($user_id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return redirect("http://localhost:3000/confirmation");
//        return response()->json(["message" => "email verified."], 200);
    }

    public function resend() {
        if (auth($this->guard)->user()->hasVerifiedEmail()) {
            return response()->json(["message" => "Email has already been verified."], 400);
        }

        auth($this->guard)->user()->sendEmailVerificationNotification();

        return response()->json(["message" => "Verification email sent to your email."], 200);
    }


}
