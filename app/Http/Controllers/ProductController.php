<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  
    public  function devolverCheckout(){
        echo "<pre>";
        
       echo var_dump(window.localStorage.getItem('checkout'));
echo "</pre>";



        $animales = $this::getAnimalesAdminList();
    
    
    
        return view ('adminAnimales')->with('animales', json_decode($animales));
    }
    
  



}
