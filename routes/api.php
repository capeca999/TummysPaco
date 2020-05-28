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


Route::get('/forum/{pagina}/{cantidad?}', 'ApiController@getPreguntas');

Route::get('/animales/{especie}/{pagina}/{cantidad?}', 'ApiController@getAnimalsSpecieListPagina');

Route::get('/pedidos/{pagina}/{cantidad?}/{estado?}/{nombre?}', 'ApiController@getPedidosListPagina');

Route::get('/pedidosCambiarEstado/{id}/{valor}', 'ApiController@CambiarEstadoPedido');


Route::get('/gethistorial/{id?}','ApiController@gethistorialusuario');

Route::get('/getDireccion/{id}','ApiController@getDireccionid');


Route::get('/productos/{id?}', 'ApiController@getProductById');
Route::get('/productosCupon/{id?}', 'ApiController@getCouponById');

Route::get('/getPesos/{id?}', 'ApiController@getpesos');
Route::get('/getvacunas/{id?}', 'ApiController@getvacunas');

Route::get('/eliminarAnimal/{id}', 'ApiController@eliminarAnimal');


Route::get('/getEstadisticaAnimales/', 'ApiController@getEstadisticaAnimales');

Route::post('/gettipovacunas/', 'ApiController@getVacuna');

Route::post('/crearProducto/', 'ApiController@postProducto');
Route::post('/crearAnimal/', 'ApiController@postAnimal');
Route::post('/crearPedido/', 'ApiController@postOrder');
Route::post('/crearLinea/', 'ApiController@postLinea');
Route::post('/crearDireccion/', 'ApiController@postDireccion');
Route::post('/crearInsignia/', 'ApiController@postInsignia');
Route::post('/hacerDonacion/', 'ApiController@postDonacion');
Route::post('/crearPeso/', 'ApiController@PostPeso');
Route::post('/crearVacuna/', 'ApiController@PostVacuna');


Route::get('/animalinfo/{id?}', 'ApiController@getAnimalById');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

