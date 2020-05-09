<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Petitions;
class PetitionController extends Controller
{
    public  function getPetitionsAdmin(){
        $petitions = $this::getPetitionsAdminList();
        return view ('adminPetitions')->with('petitions', json_decode($petitions));
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
