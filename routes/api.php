<?php

use App\Http\Controllers\Api\V1\PositionController;
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

//Route::apiResource('positions', PositionController::class);
//Route::apiResource('vessels', VesselController::class);

/*
|--------------------------------------------------------------------------
| Position endpoints
|--------------------------------------------------------------------------
 */
Route::name('positions.')->controller(PositionController::class)->prefix('api/v1/positions')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('create');
    Route::get('/{position}', 'show')->name('show');
    Route::put('/{position}', 'update')->name('update');
    Route::delete('/{position}', 'destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Vessel endpoints
|--------------------------------------------------------------------------
 */
Route::name('vessels.')->controller(VesselController::class)->prefix('vessels')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('create');
    Route::get('/{vessel}', 'show')->name('show');
    Route::put('/{vessel}', 'update')->name('update');
    Route::delete('/{vessel}', 'destroy')->name('destroy');
});
