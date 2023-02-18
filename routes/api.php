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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('dev')->name('api.v1.')->group(function () {
    Route::get('/test', 'API\DevController@test')->name('dev.test');
    Route::get('/install_command', 'API\DevController@install_command')->name('dev.install_command');
    Route::get('/install_command_migrate', 'API\DevController@install_command_migrate')->name('dev.install_command_migrate');
});