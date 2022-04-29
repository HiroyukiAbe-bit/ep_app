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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('ver','API\VerController@index');

Route::apiResource('form/store', 'API\ParticipantsController');
Route::apiResource('/admin/index','API\ParticipantsController');

Route::post('/login', 'Api\AuthController@login');

// ユーザー情報と、ログアウトは認証あり
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/me', 'Api\AuthController@me');
    Route::post('/logout', 'Api\AuthController@logout');
});

