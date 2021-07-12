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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::fallback(function () {
   return response()->json([
       'message' => 'Page not found.',
       'code' => 404
   ]);
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('signup', 'Auth\RegisterController@create');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::delete('logout', 'Auth\LoginController@logout');
        Route::get('me', 'UserController@index');
    });
});


Route::apiResource('user', 'UserController');
