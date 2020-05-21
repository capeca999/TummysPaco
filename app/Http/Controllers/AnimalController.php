<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Animal;
use DB;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



public static function getNewerAnimals()
{
    $animales = Animal::select('animals.id','animals.id_user','animals.race','animals.species','animals.date_of_birth','animals.description','animals.health','animals.nickname','animals.place_found','animals.size','animals.date_found','animals.condition','animals.gender', 'images_animals.url')
    ->orderBy('date_found', 'DESC')
    ->where('animals.id_user', '=' ,null)
    ->join('images_animals', 'images_animals.id_animal', 'animals.id')
    ->groupBy('animals.id')
    ->limit(6)
    ->get();

/*
echo "<pre>";
var_dump($animales);
echo "</pre>";
die;
*/
return $animales;
}


public static function getAnimalCategory()
{
    $animales = DB::select('animals')
    ->orderBy('date_found')
    ->where('animals.id_user', '=' ,null)
    ->limit(6)
    ->get();
return $animales;
}



public static function getAnimalID($id){

$animales = Animal::select('animals.id','animals.id_user','animals.race','animals.species','animals.date_of_birth','animals.description','animals.health','animals.nickname','animals.place_found','animals.size','animals.date_found','animals.condition','animals.gender', 'images_animals.url')
->join('images_animals','images_animals.id_animal','animals.id')
->where('animals.id', '=', $id)
->get()
->toJson();


return view('animalDetalles')->with('animales', json_decode($animales));

}


public static function getAnimalIDFormulario($id){
    $animales = Animal::select('animals.id','animals.id_user','animals.race','animals.species','animals.date_of_birth','animals.description','animals.health','animals.nickname','animals.place_found','animals.size','animals.date_found','animals.condition','animals.gender', 'images_animals.url')
    ->join('images_animals','images_animals.id_animal','animals.id')
    ->where('animals.id', '=', $id)
    ->get()
    ->toJson();
    return view('formularioAdoptar')->with('animales', json_decode($animales));
    }
    
    

/*

return Animal::select('animals.id', 'animals.race', 'animals.species','animals.date_of_birth','animals.description','animals.nickname', 'animals.place_found', 'animals.date_found', 'images.url')
->join('images', 'images.id_animal', '=',  'animals.id')
->where('species', 'like', $especie)
->get()
->splice(($cantidad*$pagina), $cantidad)
->toJson();*/
public  function getAnimalesAdmin(){
    $animales = $this::getAnimalesAdminList();



    return view ('adminAnimales')->with('animales', json_decode($animales));
}



public static function getAnimalesAdminList(){

  
    return Animal::select('animals.id', 'animals.id_user', 'animals.race', 'animals.species','animals.date_of_birth','animals.description','animals.nickname', 'animals.place_found', 'animals.date_found', 'animals.condition', 'animals.gender', 'animals.health', 'animals.size','images_animals.url')
    ->join('images_animals', 'images_animals.id_animal', '=',  'animals.id')
    ->groupBy('animals.id')
    ->get()
    ->toJson();
    }




    /**
     * Modifica el valor con el $valor pasado del atributo pasado con el valor $atributo del animal con ese id 
     *
     * @param  int $id
     * @param  string $atributo
     * @param  string $valor
     *
     * @return array Animales
     */
    public static function modificarAnimal($id,$atributo,$valor){
        $animal = Animal::find($id);
        $animal->$atributo = $valor;
        $animal->save(); 
    }

    public static function modificarAnimalEstado($id,$atributo){
        $animal = Animal::find($atributo);
        $animal->id_user = $id;
        $animal->save(); 
    }



}


