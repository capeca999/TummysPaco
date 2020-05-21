<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use DB;

class ProductController extends Controller
{

    public  function devolverCheckout(){
        echo "<pre>";
        
       echo var_dump(window.localStorage.getItem('checkout'));
echo "</pre>";



        $animales = $this::getAnimalesAdminList();
    
    
    
        return view ('adminAnimales')->with('animales', json_decode($animales));
    }
    
    public function getProductosAgrupados(){

$Productos = $this::getProductosAgrupadosList();
return view('donarProductos')->with('productos', json_decode($Productos));
    }
  
    public static function getProductosAgrupadosList(){

     return Product::select('products.id',  'products.stock','products.name','products.description', 'products.price', 'products.image')
    ->groupBy('products.id')
     ->get()
     ->toJson();
        }


        public function getProductosAdmin(){

            $Productos = $this::getProductosAgrupadosListAdmin();
            return view('adminProductos')->with('productos', json_decode($Productos));
                }
              
                public static function getProductosAgrupadosListAdmin(){           
                 return Product::select('products.id',  'products.stock','products.name','products.description', 'products.price', 'products.image')
                ->groupBy('products.id')
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
        public static function modificarProducto($id,$atributo,$valor){
            $petition = Product::find($id);
            $petition->$atributo = $valor;
            $petition->save(); 
        }
 




}
