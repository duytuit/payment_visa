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
    Route::get('/generate_captcha', 'API\DevController@generateCaptcha')->name('dev.generateCaptcha');
});
Route::post('payment/info', 'InfoPaymentVisaController@store')->name('payment.store');
Route::post('transaction/payment', 'InfoPaymentVisaController@payment')->name('transaction.payment');
Route::get('transaction/result', 'InfoPaymentVisaController@callback')->name('transaction.callback');
Route::post('v2/transaction/payment', 'InfoPaymentVisa2Controller@payment')->name('v2.transaction.payment');
Route::get('v2/transaction/result', 'InfoPaymentVisa2Controller@callback')->name('v2.transaction.callback');
