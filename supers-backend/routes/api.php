<?php

use Illuminate\Http\Request;

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
Route::middleware('cors')->group(function () {
    Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
     
    Route::prefix('/donation')->group(function () {
        Route::post("/", "DonationController@store");
        Route::delete("/{donationId}", "DonationController@delete");
    });
});

    Route::prefix('/group')->group(function () {
        Route::get("/hello", "Controller@test");
    });

    Route::prefix('/place')->group(function () {
        Route::get("/", "PlaceController@index");
        Route::get("/{place}", "PlaceController@show");
    });
});
