

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'checkAdmin'], function () {

    Route::get('sendmail/{mensaje}/{email}', function($mensaje, $email){
      
        $data=array(
            'mensaje' => $mensaje,
        );
 
        Mail::send('emails.adoptar', $data, function ($message) use($email){
       
        $message->from('tummysrefugio@gmail.com', 'Felicidades Por Tu Adopción!');
        $message->to($email)->subject('Felicidades Por Tu Adopción');
        });
       
        return "Tu Email se ha enviado";
        });


               
    Route::get('sendmailProducto/{mensaje}/{email}', function($mensaje, $emaildonar){
        var_dump($emaildonar);
        $data=array(
            'mensaje' => $mensaje,
        );
        var_dump($emaildonar);

        Mail::send('emails.comprar', $data, function ($message) use($emaildonar){
        $message->from('tummysrefugio@gmail.com', 'Felicidades Por Tu Compra!');
        $message->to($emaildonar)->subject('Felicidades Por Tu Compra');
        });
        return "Tu Email se ha enviado";
        });

        Route::get('/eliminarPetition/{id}', 'PetitionController@eliminarPetition');  



        Route::get('/listar/modificarUsuario/{id}/{atributo}/{valor}', 'UserController@modificarUsuario');  

        Route::get('/listar/modificarAnimal/{id}/{atributo}/{valor}', 'AnimalController@modificarAnimal');  

        Route::get('/listar/modificarStatus/{id}/{atributo}/{valor}', 'PetitionController@modificarPetition');  

        Route::get('/listar/modificarProducto/{id}/{atributo}/{valor}', 'ProductController@modificarProducto');  


        Route::get('/modificarAnimalAdoptar/{id}/{idanimal}', 'AnimalController@modificarAnimalEstado');

        Route::get('/AnimalesAdmin/', 'AnimalController@getAnimalesAdmin');
        Route::get('/ProductosAdmin/','ProductController@getProductosAdmin');
        Route::get('/UsuariosAdmin/', 'UserController@getUsuariosAdmin');
        Route::get('/PeticionesAdmin/', 'PetitionController@getPetitionsAdmin');
        Route::get('/PedidosAdmin/', 'UserController@getPedidosAdmin');
        Route::get('/PesosVacunasAdmin/', 'AnimalController@getAnimalesVacunarPesar');

        Route::get('/GraficasAdmin/', function() {
            return view('adminDiagramas');
            });
    

});


Route::get('/animales/casosEspeciales/', 'ApiController@getAnimalsEspeciales');

Route::middleware('auth')->get('/animales/formularioAdoptar/{id}', 'AnimalController@getAnimalIDFormulario');

Route::middleware('auth')->post('/usuario/perfil', 'UserController@update_avatar');




Route::get('/listar/modificarUsuarioPerfil/{atributo}/{valor}', 'UserController@modificarUsuarioperfil');  

Route::get('/animalesAdoptados/', 'ApiController@MostrarAnimalesAdoptados');
Route::get('/animalesAdoptados/{pagina}', 'ApiController@MostrarAnimalesAdoptadosPagina');

Route::get('/animales/{especie}', 'ApiController@getAnimalsSpecie');
Route::get('/animales/{especie}/{pagina}', 'ApiController@getAnimalsSpecieListPagina');


Route::get('/home','PrincipalController@index' );
Route::get('/', 'PrincipalController@index');



    Route::get('/donarProductos/', 'ProductController@getProductosAgrupados');    
    Route::middleware('auth')->post('anydadirpeticion', 'HomeController@ProcesoAdopciónPost');    
    Route::middleware('auth')->post('comprobarPeticion', 'HomeController@ProcesoAdopciónConsultar');    
/*
   
    Route::middleware('auth')->get('/paginaComprar/', function() {
    return view('Checkout');
    });


    */


    Route::middleware('auth')->get('/paginaComprar/', 'UserController@getDirecciones');    


    Route::middleware('auth')->get('/donacion/', function() {
        return view('donardinero');
        });


    Route::middleware('auth')->get('/listar/selectBadge/{id}', 'UserController@changeBadge');
    Route::middleware('auth')->get('/usuario/perfil', 'UserController@getperfil');




Route::get('registro/', function () {
    return view('auth.register');
});
     
Route::get('/informacionimportante/', function () {
    return view('informacionImportante');
});
     

Route::get('login/', function () {
    return view('auth.login');
});


Route::get('animales/', function() {
    return view('animalesCategorias');
    });
    Route::get('contacto/', function() {
        return view('contacto');
        });
    
 

    Route::get('/politicaPrivacidad/', function() {
        return view('politicaDePrivacidad');
        });
    
      
        
    Route::get('/condicionesAdoptar/', function() {
        return view('condicionesAdoptar');
        });


    

        Route::get('/aboutUs/', function() {
            return view('aboutUs');
            });
        
    
            Route::get('/PreguntasFrecuentes/', function() {
                return view('faq');
                });


                Route::middleware('auth')->post('/forum/', 'PreguntasController@crearquestion');
                Route::middleware('auth')->post('/forum/thread', 'PreguntasController@crearrespuesta');

                Route::get('/forum/thread/{id}', 'PreguntasController@getthread');


                

                Route::get('/darLike/{id}', 'PreguntasController@likequestion');
                Route::get('/quitarLike/{id}', 'PreguntasController@quitarlikequestion');

                Route::get('/darLikeAnswer/{idquestion}/{idanswer}', 'PreguntasController@likeanswer');
                Route::get('/quitarLikeAnswer/{idquestion}/{idanswer}', 'PreguntasController@quitarlikeanswer');
                Route::get('/forum/', 'PreguntasController@preguntas');






    Route::get('/animal/{id}', 'AnimalController@getAnimalID');

Auth::routes();
Route::get('/productos/busqueda', 'ApiController@indexToysGenerico');
Route::get('/productos/busqueda/{nombre}/{pagina?}', 'ApiController@indexToysName');



Route::get('watermark-image', 'WaterMarkController@imageWatermark');
Route::get('watermark-text', 'WaterMarkController@textWatermark');

Route::get('cesta/pagar','pagoController@getMetodos');
/*
|--------------------------------------------------------------------------
| CRUD Usuario
|--------------------------------------------------------------------------
|
| Las rutas relacionadas de los usuarios
|
*/
Route::group(['prefix' => 'usuario'], function(){

 

                              


    Route::middleware('auth')->get('perfil/historial/', 'UserController@historialUsuario');

    
    //GESTIÓN LISTAR USUARIOS
    Route::get('listar/historial/{nif}', 'UserController@historialAdmin');
    Route::get('listar/historial/importe/{nif}/{importe}', 'UserController@historialImporte');
    Route::get('listar/historial/fecha/{nif}/{fecha}', 'UserController@historialFecha');

    
   

    //LISTAR USUARIOS
    Route::get('listar/', function () {
        return view('usuarios.listar-usuarios');
    });
    Route::get('listar/mostrar/', 'UserController@listarUsuarios');

});





Route::get('/politicaDePrivacidad/',function(){
    return view('politicaDePrivacidad');
});
    

                              


/*
|--------------------------------------------------------------------------
| CRUD Producto
|--------------------------------------------------------------------------
|
| Las rutas relacionadas de los productos
|
*/
Route::group(['prefix' => 'producto'], function(){

/*    Route::get('detalle/{id}', function ($id) {
        return view('productos.detalle')->with('id',$id);
    });*/

    Route::get('detalle/{id}', 'ProductController@mostrarProducto');

    //LISTAR PRODUCTOS
    Route::get('listar/', function () {
        return view('productos.listar-productos');
    });
    Route::get('listar/mostrar/', 'ProductController@listarProductos');



    
    Route::get('listar/{categoria}', 'ProductController@listarProductosCategoria');

});

