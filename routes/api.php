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
Auth::routes(['verify' => true]);

Route::prefix('auth')->middleware(['api'])->group(function () {

    Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login'])->name('api.login');
    Route::post('register', [App\Http\Controllers\Api\AuthController::class, 'register'])->name('api.register');
    Route::get('email/verify/{id}', [App\Http\Controllers\Api\VerificationController::class, 'verify'])->name('verification.verify');
    Route::get('email/verifyEmail/{id}', [App\Http\Controllers\Api\VerificationController::class, 'verifyEmail'])->name('verification.verifyEmail');

    Route::middleware(['auth:api'])->group(function () {
        Route::post('logout', [App\Http\Controllers\Api\AuthController::class, 'logout'])->name('api.logout');
        Route::post('refresh', [App\Http\Controllers\Api\AuthController::class, 'refresh'])->name('api.refresh');
        Route::get('user-profile', [App\Http\Controllers\Api\AuthController::class, 'userProfile'])->name('api.user.profile');
        Route::put('edit-profile', [App\Http\Controllers\Api\AuthController::class, 'editProfile'])->name('api.edit.profile');
        Route::post('change-password', [App\Http\Controllers\Api\AuthController::class, 'changePassword'])->name('change.password');
        Route::get('email/resend', [App\Http\Controllers\Api\VerificationController::class, 'resend'])->name('verification.resend');
    });
});

Route::middleware(['api'])->group(function () {
    Route::get('/cities/{country}', [App\Http\Controllers\CityController::class, 'index']);

    Route::resource('cities',\App\Http\Controllers\CityController::class);

});
