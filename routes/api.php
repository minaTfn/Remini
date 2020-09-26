<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::post('register', [App\Http\Controllers\Api\AuthController::class, 'register']);
    Route::post('logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
    Route::post('refresh', [App\Http\Controllers\Api\AuthController::class, 'refresh']);
    Route::get('user-profile', [App\Http\Controllers\Api\AuthController::class, 'userProfile']);
    Route::get('email/verify/{id}', [App\Http\Controllers\Api\VerificationController::class, 'verify'])->name('verification.verify');
    Route::get('email/resend', [App\Http\Controllers\Api\VerificationController::class, 'resend'])->name('verification.resend');
});
