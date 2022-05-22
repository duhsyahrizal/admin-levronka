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

Route::post('/login', 'ApiController@login');

Route::group(['middleware' => ['cors', 'auth:sanctum']], function() {
    Route::get('product', 'ApiController@productJson');
    Route::get('user/visit', 'ApiController@userVisit');

    Route::post('/logout', 'ApiController@logout');
});
