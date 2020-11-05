<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\User as UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\User;

class AuthController extends Controller {

    private $faLanguage = false;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->guard = "api";
        $this->faLanguage = request()->header('Accept-Language') === 'fa' ? true : false;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => ['error' => $validator->errors()],
            ], 422);
        }

        if (!$token = auth($this->guard)->attempt($validator->validated())) {
            return response()->json([
                'data' => [
                    'non_field_errors' => $this->faLanguage
                        ? 'ایمیل یا رمز شما صحیح نمی باشد'
                        : 'These credentials do not match our records'
                ],
            ], 401);
        }

        return $this->createNewToken($token);
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword(UserRequest $request) {

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->password)]);

        return response()->json(
            ['message' => $this->faLanguage ? 'رمز شما با موفقیت تغییر یافت' : 'Password changed successfully']
            , 200);

    }

    /**
     * Register a User.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserRequest $request) {

        $user = User::create(array_merge(
            $request->all(),
            ['password' => bcrypt($request->password)]
        ))->sendEmailVerificationNotification();

        return response()->json([
            'message' => $this->faLanguage
                ? 'ثبت نام شما با موفقیت انجام شد و ایمیل تاییدیه برای شما ارسال گردید'
                : 'User successfully registered and verify email sent',
            'data' => ['user' => $user]
        ], 201);
    }


    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth($this->guard)->refresh());
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editProfile(UserRequest $request) {

        User::find(auth()->user()->id)->update(['name' => $request->name]);

        return response()->json(['message' => $this->faLanguage ? 'پروفایل شما با موفقیت ویرایش شد' : 'Your profile updated successfully'], 200);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {

        auth($this->guard)->logout();

        return response()->json(['message' => $this->faLanguage ? 'شما از حساب خود خارج شدید' : 'User successfully signed out']);
    }

    /**
     * Get the authenticated User.
     *
     * @return UserResource
     */
    public function userProfile() {

        return new UserResource(auth($this->guard)->user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token) {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth($this->guard)->factory()->getTTL() * 60,
            'user' => auth($this->guard)->user()
        ]);
    }

}
