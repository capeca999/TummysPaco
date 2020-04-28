<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Animal;
use Auth;

class PrincipalController extends Controller
{
    public function index() {
        if (Auth::check()) {
            setcookie('logueado',Auth::user());
        }else{
            setcookie('logueado',null,-1);
        }
    
        return view("indice")->with('animales' , AnimalController::getNewerAnimals());
    }
}
