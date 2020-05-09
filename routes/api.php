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

Route::middleware('auth:api')->get('/productos/{id?}', 'ApiController@getProductById');


//Route::middleware('auth:api')->get('/usuarios/perfil/getHistorial/{id?}', 'ApiController@getHistorialUsuario');



Route::get('/productos/{id?}', 'ApiController@getProductById');
Route::get('/productosCupon/{id?}', 'ApiController@getCouponById');
Route::get('/animalinfo/{id?}', 'ApiController@getAnimalById');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

