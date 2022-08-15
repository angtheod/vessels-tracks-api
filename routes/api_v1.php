<?php

use App\Http\Controllers\Api\V1\PositionController;
use App\Http\Controllers\Api\V1\VesselController;
use Illuminate\Support\Facades\Route;

/** @var \Laravel\Lumen\Routing\Router $router */

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

/*
|--------------------------------------------------------------------------
| Position endpoints
|--------------------------------------------------------------------------
 */
$router->group([], function () use ($router) {
    $router->get('positions', ['as' => 'positions.index', 'uses' => 'PositionController@index']);
    $router->post('positions', ['as' => 'positions.create', 'uses' => 'PositionController@store']);
    $router->get('positions/{id}', ['as' => 'positions.show', 'uses' => 'PositionController@show']);
    $router->put('positions/{id}', ['as' => 'positions.update', 'uses' => 'PositionController@update']);
    $router->delete('positions/{id}', ['as' => 'positions.delete', 'uses' => 'PositionController@destroy']);
});

/*
|--------------------------------------------------------------------------
| Vessel endpoints
|--------------------------------------------------------------------------
 */
$router->group([], function () use ($router) {
    $router->get('vessels', ['as' => 'vessels.index', 'uses' => 'VesselController@index']);
    $router->post('vessels', ['as' => 'vessels.create', 'uses' => 'VesselController@store']);
    $router->get('vessels/{id}', ['as' => 'vessels.show', 'uses' => 'VesselController@show']);
    $router->put('vessels/{id}', ['as' => 'vessels.update', 'uses' => 'VesselController@update']);
    $router->delete('vessels/{id}', ['as' => 'vessels.delete', 'uses' => 'VesselController@destroy']);
});
