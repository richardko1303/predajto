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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/search', 'App\Http\Controllers\InzeratController@search');

Route::group(['prefix' => 'auth'], function () {
    Route::post('signup', 'App\Http\Controllers\AuthController@signup');
    Route::post('login', 'App\Http\Controllers\AuthController@login');
});

Route::group(['prefix' => 'inzerat'], function () {
    Route::get('/', 'App\Http\Controllers\InzeratController@index');
    Route::get('/{id}', 'App\Http\Controllers\InzeratController@show');
    Route::post('/', 'App\Http\Controllers\InzeratController@store');
    Route::put('/{id}', 'App\Http\Controllers\InzeratController@update');
    Route::delete('/{id}', 'App\Http\Controllers\InzeratController@destroy');
});
