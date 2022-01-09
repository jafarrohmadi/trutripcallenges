<?php

use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
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

Route::group(['prefix' => 'auth'], function() {
    Route::post('login', [UserController::class, 'login'])->name('login');
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('profile', [UserController::class, 'profile']);
        Route::post('logout', [UserController::class, 'logout'])->name('logout');

    });
});
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('trip', TripController::class);
});
