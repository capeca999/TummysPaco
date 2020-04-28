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
//http://localhost.toysworld/productos/busqueda/Hulk
Route::get('/productos/busqueda/{nombre}/{pagina?}', 'ApiController@getToysByName');
Route::get('/toys/{pagina}/{nombre?}/{cantidad?}', 'ApiController@getToys');
Route::get('/category/{categoria}/{pagina}/{cantidad?}', 'ApiController@getCategory');
Route::get('/category/{categoria}','ApiController@getCategory');
Route::get('/category', 'ApiController@getAllCategory');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

///api/category/1/1
///api/category/2/1


///api/category/1/2
