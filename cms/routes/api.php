<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\TokenMiddleware as AuthMiddleware;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/search', 'App\Http\Controllers\InzeratController@search');

Route::group(['prefix' => 'auth'], function () {
    Route::post('signup', 'App\Http\Controllers\AuthController@signup');
    Route::post('login', 'App\Http\Controllers\AuthController@login');
});

Route::group(['prefix' => 'inzerat'], function () {
    Route::middleware(AuthMiddleware::class)->group(function () {
        Route::get('/', 'App\Http\Controllers\InzeratController@index');
        Route::get('/{id}', 'App\Http\Controllers\InzeratController@show');
        Route::post('/', 'App\Http\Controllers\InzeratController@create');
        Route::put('/{id}', 'App\Http\Controllers\InzeratController@update');
        Route::delete('/{id}', 'App\Http\Controllers\InzeratController@destroy');
    });
});
