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
Route::delete('form/destroy','API\ParticipantsController@destroy');

Route::post('/login', 'API\AuthController@login');

// ユーザー情報と、ログアウトは認証あり
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/me', 'API\AuthController@me');
    Route::post('/logout', 'API\AuthController@logout');
});

