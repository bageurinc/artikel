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

// Route::group(['prefix' => 'auth',''], function ($router) {
//     Route::post('login', 'jwt\AuthController@login')->middleware('guest');
//     Route::post('logout', 'jwt\AuthController@logout')->middleware('auth:api');
//     Route::post('refresh', 'jwt\AuthController@refresh')->middleware('auth:api');
//     Route::post('me', 'jwt\AuthController@me')->middleware('auth:api');
// });

Route::name('bageur.')->group(function () {
	Route::group(['prefix' => 'v1','middleware' => 'jwt.verify'], function () {
		Route::apiResource('reward', 'rewardController');
	});
});