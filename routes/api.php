<?php

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
    Route::middleware(['auth:api'])->group(function () {
        Route::resource('/deliveries', App\Http\Controllers\DeliveryController::class, ['names' => 'api.deliveries']);
        Route::get('my-deliveries/',  [App\Http\Controllers\DeliveryController::class, 'myDeliveries'])->name('api.my.deliveries');
        Route::get('my-deliveries/{delivery}', [App\Http\Controllers\DeliveryController::class, 'show'])->name('api.get.delivery');
        Route::post('deliveries/{delivery}/favorites', [App\Http\Controllers\UserFavoriteDeliveryController::class, 'store'])->name('api.favorite');
    });


    Route::get('deliveries/', [App\Http\Controllers\DeliveryController::class, 'index'])->name('api.list.deliveries');
    Route::get('deliveries/', [App\Http\Controllers\DeliveryController::class, 'index'])->name('api.list.deliveries');
    Route::get('deliveries/{delivery}', [App\Http\Controllers\DeliveryController::class, 'show'])->name('api.deliveries.show');
    Route::get('deliveries/{delivery}/contact-info', [App\Http\Controllers\DeliveryController::class, 'getContactInfo'])->name('api.get.contact.info');

    Route::get('getCountries', [App\Http\Controllers\CountryController::class, 'index'])->name('api.get.countries');
    Route::get('getCountry/{id}', [App\Http\Controllers\CountryController::class, 'show'])->name('api.get.country');
    Route::get('countries', [App\Http\Controllers\CountryController::class, 'list'])->name('api.countries');
    Route::get('getPaymentMethods', [App\Http\Controllers\PaymentMethodController::class, 'index'])->name('api.get.payment.methods');
    Route::get('getDeliveryMethods', [App\Http\Controllers\DeliveryMethodController::class, 'index'])->name('api.get.delivery.methods');
    Route::get('getContactMethods', [App\Http\Controllers\ContactMethodController::class, 'index'])->name('api.get.contact.methods');

    Route::post('contactUs', [App\Http\Controllers\ContactUsController::class, 'store'])->name('api.contact.us');

    Route::get('getUsers', [App\Http\Controllers\Api\SiteUsersController::class, 'index'])->name('api.get.users');
    Route::get('getUser/{id}', [App\Http\Controllers\Api\SiteUsersController::class, 'show'])->name('api.get.user');

    Route::get('getCities/', [App\Http\Controllers\CityController::class, 'index']);

    Route::get('/cities/{country}', [App\Http\Controllers\CityController::class, 'list']);

});

//php artisan route:list --columns=method --columns=uri --columns=name --columns=action
