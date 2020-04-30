<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Animal;
use DB;

class ApiController extends Controller
{

/*

        $productosPorPagina = 20;
        return Product::all()->where('state','=','alta')->skip(($numPag-1)*$productosPorPagina)->take($productosPorPagina);

*/



public function getAnimalsSpecie($especie){
    $animales = $this::getAnimalsSpecieList(1, $especie, 20);
/*
    echo '<pre>';
    echo var_dump(json_decode($animales));
    echo '</pre>';
die;
*/
    return view ('animales')->with('animales', json_decode($animales));

}
//getAnimalsEspeciales


public  function getAnimalsEspeciales($pagina=1,  $cantidad=20){
    $animales = $this::getAnimalsEspecialesList(1,20);



    return view ('animalesEspeciales')->with('animales', json_decode($animales));
}



public static function getAnimalsEspecialesList($pagina=1,  $cantidad=20){
    if($cantidad<=0){
        $cantidad=20;
    }
    if($pagina<1){
        $pagina=1;
    }
    $pagina--;
    return Animal::select('animals.id', 'animals.race', 'animals.species','animals.date_of_birth','animals.description','animals.nickname', 'animals.place_found', 'animals.date_found', 'images.url')
    ->join('images', 'images.id_animal', '=',  'animals.id')
    ->whereNotNull('condition')
    ->groupBy('animals.id')
    ->get()
    ->splice(($cantidad*$pagina), $cantidad)
    ->toJson();
    }
    

public static function getAnimalsSpecieList($pagina=1, $especie, $cantidad=20){




if($cantidad<=0){
    $cantidad=20;
}

if($pagina<1){
    $pagina=1;
}

$pagina--;


if($especie=="Todos"){
    return Animal::select('animals.id', 'animals.race', 'animals.species','animals.date_of_birth','animals.description','animals.nickname', 'animals.place_found', 'animals.date_found', 'animals.condition' , 'images.url')
->join('images', 'images.id_animal', '=',  'animals.id')
->groupBy('animals.id')
->get()
->splice(($cantidad*$pagina), $cantidad)
->toJson();
}
else{
    return Animal::select('animals.id', 'animals.race', 'animals.species','animals.date_of_birth','animals.description','animals.nickname', 'animals.place_found', 'animals.date_found', 'animals.condition' , 'images.url')
->join('images', 'images.id_animal', '=',  'animals.id')
->where('species', 'like', $especie)
->groupBy('animals.id')
->get()
->splice(($cantidad*$pagina), $cantidad)
->toJson();
}
}



public function indexToysGenerico(){
$productos = $this::getToys(1,21);

return view('search')->with('productos', json_decode($productos));


//return view('search')->with('productos', $this::json_decode(getToys(1, 21)));
}

public function indexToysName($nombre){
    $productos = $this::getToysByName(1,21, $nombre);
    return view('search')->with('productos', json_decode($productos));
    //return view('search')->with('productos', $this::json_decode(getToys(1, 21)));
    }
    


public static function getToysByName($pagina=1, $cantidad=21, $nombreToy=""){

    if($cantidad<=0){
$cantidad=21;
    }

    if($pagina<1){
        $pagina=1;
    }
$pagina--;
return Product::all()->where('name', 'like', '%'.$nombreToy.'%')->splice(($cantidad*$pagina), $cantidad)->toJson();
}


public static function  getToys($pagina, $cantidad=21 ){
    if($cantidad<=0){
        $cantidad=21;
    }
    if ($pagina < 1){
        $pagina=1;
    }
    $pagina--;
        return Product::all()->splice(($cantidad*$pagina), $cantidad)->toJson();
 
    //      return json_encode(Product::all()->take(($pagina*21)));
}



    public static function  getCategory($categoria=0, $pagina=1, $cantidad=21){
        if($cantidad<=0){
            $cantidad=21;
        }
        if ($pagina < 1){
            $pagina=1;
        }

        $pagina--;
        //      return json_encode(Product::all()->take(($pagina*21)));
        return Product::all()->where('id_category', '=', $categoria)->splice(($cantidad*$pagina), $cantidad)->toJson();
        
    }

    public static function  getAllCategory(){
        return Category::all();
    }


    //
}

///api/products()
