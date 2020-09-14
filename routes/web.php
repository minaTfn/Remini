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

Route::prefix('admin')->middleware(['auth','verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home');
    Route::resource('/users', App\Http\Controllers\UsersController::class)
        ->middleware('can:manage,App\Models\User');
    Route::get('/users/status/{user}', [App\Http\Controllers\UsersController::class , 'updateStatus'])
        ->name('users.updatestatus')
        ->middleware('can:manage,App\Models\User');
});

Auth::routes();


