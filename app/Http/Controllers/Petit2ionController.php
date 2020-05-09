<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Animal;
use DB;
use App\Petitions;

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


public  function getPetitionsAdmin(){
    $petitions = $this::getPetitionsAdminList();
    return view ('PetitionsAdmin')->with('petitions', json_decode($petitions));
}



public static function getPetitionsAdminList(){
    return Petitions::select('id', 'id_user', 
    'id_animal','name_petition','email_petition','telephone_number', 
    'commentary', 'Status')
    ->groupBy('id')
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
    public static function modificarPetition($id,$atributo,$valor){
        $petition = Petitions::find($id);
        $petition->$atributo = $valor;
        $petition->save(); 
    }


}


