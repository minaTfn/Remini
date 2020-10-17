<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);
Route::prefix('admin')->middleware(['auth.admin', 'verified'])->group(function () {
    Route::get('change-password', [App\Http\Controllers\ChangePasswordController::class, 'index'])->name('changePassword.index');
    Route::post('change-password', [App\Http\Controllers\ChangePasswordController::class, 'store'])->name('changePassword.store');

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home');

    Route::resource('/users', App\Http\Controllers\UsersController::class)
        ->middleware('can:manage,App\Models\User');

    Route::resource('/deliveries', App\Http\Controllers\DeliveryController::class);
    Route::resource('/delivery-methods', App\Http\Controllers\DeliveryMethodController::class);
    Route::resource('/payment-methods', App\Http\Controllers\PaymentMethodController::class);
    Route::resource('/contact-methods', App\Http\Controllers\ContactMethodController::class);
    Route::resource('/site-users', App\Http\Controllers\SiteUserController::class);
    Route::get('/site-users/status/{user}', [App\Http\Controllers\SiteUserController::class, 'updateStatus'])
        ->name('site-users.updateStatus')
        ->middleware('can:manage,App\Models\User');


    Route::get('/users/status/{user}', [App\Http\Controllers\UsersController::class, 'updateStatus'])
        ->name('users.updateStatus')
        ->middleware('can:manage,App\Models\User');
});




