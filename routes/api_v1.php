<?php

use App\Http\Controllers\Api\V1\TrackController;
use App\Http\Controllers\Api\V1\VesselController;
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

//Route::apiResource('tracks', TrackController::class);
//Route::apiResource('vessels', VesselController::class);

/*
|--------------------------------------------------------------------------
| Track endpoints
|--------------------------------------------------------------------------
 */
Route::name('tracks.')->controller(TrackController::class)->prefix('api/v1/tracks')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('create');
    Route::get('/{track}', 'show')->name('show');
    Route::put('/{track}', 'update')->name('update');
    Route::delete('/{track}', 'destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Vessel endpoints
|--------------------------------------------------------------------------
 */
Route::name('vessels.')->controller(VesselController::class)->prefix('api/v1/vessels')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('create');
    Route::get('/{vessel}', 'show')->name('show');
    Route::put('/{vessel}', 'update')->name('update');
    Route::delete('/{vessel}', 'destroy')->name('destroy');
});
