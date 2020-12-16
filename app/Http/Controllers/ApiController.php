<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Animal;
use App\Coupon;
use DB;
use App\User;
use Auth;
use App\Order;
use App\Line;
use App\Petitions;
use App\Question;
use App\Award;
use App\Weight;
use App\Vaccines;
use App\Vaccination;
use App\Answer;
use App\Addresses;
class ApiController extends Controller

{

/*

        $productosPorPagina = 20;
        return Product::all()->where('state','=','alta')->skip(($numPag-1)*$productosPorPagina)->take($productosPorPagina);

*/

public static function getProductById($id){
    return Product::select ('products.id', 'products.price', 'products.stock', 'products.name', 'products.description', 'products.description')
    ->where('products.id', 'like', $id)
    ->get()
    ->toJson();
    }



    public static function getpesos($id){
        $pesos= Weight::select ( 'weights.kg')
        ->where('weights.id_animal', '=', $id)
        ->selectRaw('YEAR(weights.date) as anyo')
        ->get()
        ->toJson();


$arraypesos= json_decode($pesos);



for ($cont2=0; $cont2 < count($arraypesos) ; $cont2++) { 

$arraypesos[$cont2]->y=strval($arraypesos[$cont2]->anyo);
$arraypesos[$cont2]->a=$arraypesos[$cont2]->kg;
unset($arraypesos[$cont2]->kg);
unset($arraypesos[$cont2]->anyo);
}

return $arraypesos;

}








public static function getEstadisticaAnimales(){





  $perros =   Animal::where('species' , '=' , 'Canina')->count();
$perros= json_decode($perros);





$hamsters =   Animal::where('species' , '=' , 'Hamster')->count();
$hamsters= json_decode($hamsters);

$gato =   Animal::where('species' , '=' , 'Gato')->count();
$gato= json_decode($gato);



$pesos= Weight::select ()
->get()
->toJson();


$arrayanimales= json_decode($pesos);

$arrayanimales[0]->label="Perros";
$arrayanimales[0]->value=$perros;

$arrayanimales[1]->label="Hamsters";
$arrayanimales[1]->value=$hamsters;


$arrayanimales[2]->label="Gatos";
$arrayanimales[2]->value=$gato;


unset($arrayanimales[0]->created_at);
unset($arrayanimales[0]->date);
unset($arrayanimales[0]->id);
unset($arrayanimales[0]->id_animal);
unset($arrayanimales[0]->kg);
unset($arrayanimales[0]->updated_at);
unset($arrayanimales[1]->created_at);
unset($arrayanimales[1]->date);
unset($arrayanimales[1]->id);
unset($arrayanimales[1]->id_animal);
unset($arrayanimales[1]->kg);
unset($arrayanimales[1]->updated_at);
unset($arrayanimales[2]->created_at);
unset($arrayanimales[2]->date);
unset($arrayanimales[2]->id);
unset($arrayanimales[2]->id_animal);
unset($arrayanimales[2]->kg);
unset($arrayanimales[2]->updated_at);




return $arrayanimales;

}








//    ->join('images_animals','images_animals.id_animal','animals.id')
//->join('users', 'users.id', 'questions.id_user')

public static function getvacunas($id){ 


    $vacunas= Vaccination::select ('vaccinations.id', 'vaccinations.id_vaccine  AS vaccinations.vaccine', 'vaccinations.id_animal', 'vaccinations.date', 'vaccines.id', 'vaccines.name')
    ->where('vaccinations.id_animal', '=', $id)
    ->join('vaccines', 'vaccines.id', 'vaccinations.id_vaccine')
    ->get()
    ->toJson();
//        ->join('images_animals','images_animals.id_animal','animals.id')

$arrayvacunas= json_decode($vacunas);

return $arrayvacunas;

}



public static function eliminarAnimal($id){ 
    $animaleliminar = Animal::find($id);
    $animaleliminar->delete();        

return "Se ha eliminado el animal";

}




public static function gethistorialusuario($id){ 


    
    $pedidos= Order::select ('orders.date_order', 'orders.id','orders.id_user', 'orders.total_price', 'orders.payment_method', 'orders.expected_arrival', 'orders.status','orders.USPS', 'orders.street','orders.number','orders.postal_code','orders.location','orders.province','orders.country'
    ,'orders.way','lines.id_order','lines.id_product','lines.price','lines.quantity','products.id','products.price','products.name','products.description','products.image')
    ->where('orders.id_user', '=', $id)
    ->join('lines', 'lines.id_order', 'orders.id')
    ->join('products', 'products.id', 'lines.id_product')
    ->get()
    ->toJson();
//        ->join('images_animals','images_animals.id_animal','animals.id')

$arraypedidos= json_decode($pedidos);






return $arraypedidos;

}



public static function getDireccionid($id){ 
    $direciones= Addresses::select ('addresses.street', 'addresses.number','addresses.postal_code',  
    'addresses.location', 'addresses.province', 'addresses.country', 'addresses.way', 'addresses.id')
    ->where('addresses.id', '=', $id)
    ->get()
    ->toJson();
$arraydirecciones= json_decode($direciones);
return $arraydirecciones;

}




public static function MostrarAnimalesAdoptadosPagina($pagina,  $cantidad=9){

    $num = $pagina;
    $int = (int)$num;




    if($cantidad<=0){
        $cantidad=9;
            }
        
            if($int<1){
                $int=1;
            }
        $int--;
$saltar = $int*9;
    

  
   
        return Animal::select('animals.id', 'animals.race', 'animals.species','animals.date_of_birth','animals.description','animals.nickname', 'animals.place_found', 'animals.date_found', 'animals.condition' , 'images_animals.url')
    ->join('images_animals', 'images_animals.id_animal', '=',  'animals.id')
    ->whereNotNull('animals.id_user')
   // ->groupBy('animals.id')
    ->get()
    ->skip($saltar)
    ->take($cantidad)
    ->toJson();
 
    }





public function MostrarAnimalesAdoptados(){

    $data =  array();
    $data['animales']  =  json_decode($this::getAnimalsAdoptadosList(1,9));
    $data['cantidad']  =  Animal::whereNotNull('id_user')->count();
    return view('animales',compact("data"));
}



public static function getAnimalsAdoptadosList($pagina=1, $cantidad=9){
    if($cantidad<=0){
        $cantidad=9;
            }
        
            if($pagina<1){
                $pagina=1;
            }
        $pagina--;
$saltar = $pagina*9;
    
  

        return Animal::select('animals.id','animals.id_user', 'animals.race', 'animals.species','animals.date_of_birth','animals.description','animals.nickname', 'animals.place_found', 'animals.date_found', 'animals.condition' , 'images_animals.url')
    ->join('images_animals', 'images_animals.id_animal', '=',  'animals.id')
    ->whereNotNull('animals.id_user')
    //->groupBy('animals.id')
    ->get()
    ->skip($saltar)
    ->take($cantidad)
    ->toJson();
    }
    



    


 
    public static function getAnimalById($id){
        return Animal::select('animals.id','animals.id_user','animals.race','animals.species','animals.date_of_birth','animals.description','animals.health','animals.nickname','animals.place_found','animals.size','animals.date_found','animals.condition','animals.gender', 'images_animals.url')
        ->join('images_animals','images_animals.id_animal','animals.id')
        ->where('animals.id', '=', $id)
        ->get()
        ->toJson();
        }


    public static function getCouponById($id){
        return Coupon::select ('coupons.id', 'coupons.codigo', 'coupons.descuento')
        ->where('coupons.codigo', '=', $id)
        ->get()
        ->toJson();
        }



            
//Accede por web

public function getAnimalsSpecie($especie){

    $data =  array();
    $data['animales']  =  json_decode($this::getAnimalsSpecieList(1, $especie, 9));
    $data['cantidad']  =  Animal::where('id_user', '=', null)->where('species', '=', $especie)->count();
    $data['especie'] = $especie;
    return view('animales',compact("data"));


}


public static function getAnimalsSpecieList($pagina=1, $especie, $cantidad=9){
    if($cantidad<=0){
        $cantidad=9;
            }
        
            if($pagina<1){
                $pagina=1;
            }
        $pagina--;
$saltar = $pagina*9;
    
    if($especie=="Todos"){



        return Animal::select('animals.id', 'animals.race', 'animals.species','animals.date_of_birth','animals.description','animals.nickname', 'animals.place_found', 'animals.date_found', 'animals.condition' , 'animals.id_user','images_animals.url')

    ->join('images_animals', 'images_animals.id_animal', '=',  'animals.id')
  //  ->groupBy('animals.id')
    ->where('id_user', '=', 'null')
    ->get()
    ->skip($saltar)
    ->take($cantidad)
    ->toJson();


    }
    else{

        return Animal::select('animals.id', 'animals.race', 'animals.species','animals.date_of_birth','animals.description','animals.nickname', 'animals.place_found', 'animals.date_found', 'animals.condition' , 'images_animals.url')
    ->join('images_animals', 'images_animals.id_animal', '=',  'animals.id')
    ->where('species', 'like', $especie)
    ->where('animals.id_user', '=', null)

    //->groupBy('animals.id')
    ->get()
    ->skip($saltar)
    ->take($cantidad)
    ->toJson();
    }
    }

//Accede por web

public static function getPedidosListPagina($pagina, $cantidad, $estado="Todos", $nombre=""){

    $num = $pagina;
    $int = (int)$num;


    if($cantidad<=0){
        $cantidad=9;
            }
        
            if($int<1){
                $int=1;
            }
        $int--;
$saltar = $int*$cantidad;
    
//$products = Product::where('name_en', 'LIKE', '%'.$search.'%')->get();

if($estado=="Todos"){

if($nombre==""){

    $historiales = User::select('users.id', 'users.avatar','users.name', 'users.first_name', 'orders.payment_method','orders.total_price',
    'orders.date_order','orders.descuento', 'orders.expected_arrival','orders.status', 'orders.USPS', 'orders.location', 'orders.street', 'orders.number', 'orders.id')
      ->join('orders','users.id','=','orders.id_user')
      ->orderBy('orders.id')
      ->get()
      ->skip($saltar)
      ->take($cantidad)
      ->toJson();
      return $historiales;
    
}
else{
    $historiales = User::select('users.id', 'users.avatar','users.name', 'users.first_name', 'orders.payment_method','orders.total_price',
    'orders.date_order','orders.descuento', 'orders.expected_arrival','orders.status', 'orders.USPS', 'orders.location', 'orders.street', 'orders.number', 'orders.id')
      ->join('orders','users.id','=','orders.id_user')
      ->where('users.name', 'LIKE', '%'.$nombre.'%')
      ->orWhere('users.first_name', 'LIKE', '%'.$nombre.'%')
      ->orWhere('users.last_name', 'LIKE', '%'.$nombre.'%')
      ->orderBy('orders.id')
      ->get()
      ->skip($saltar)
      ->take($cantidad)
      ->toJson();
      return $historiales;
    
}
}


else{



if($nombre==""){
    $historiales = User::select('users.id', 'users.avatar','users.name', 'users.first_name', 'orders.payment_method','orders.total_price',
    'orders.date_order','orders.descuento', 'orders.expected_arrival','orders.status', 'orders.USPS', 'orders.location', 'orders.street', 'orders.number')
      ->join('orders','users.id','=','orders.id_user')
      ->where('orders.status', '=', $estado )
      ->orderBy('orders.id')
      ->get()
      ->skip($saltar)
      ->take($cantidad)
      ->toJson();
      return $historiales;

}

else{

    $historiales = User::select('users.id', 'users.avatar','users.name', 'users.first_name', 'orders.payment_method','orders.total_price',
    'orders.date_order','orders.descuento', 'orders.expected_arrival','orders.status', 'orders.USPS', 'orders.location', 'orders.street', 'orders.number')
      ->join('orders','users.id','=','orders.id_user')
      ->where('orders.status', '=', $estado )
      ->where('users.name', 'LIKE', '%'.$nombre.'%')
      ->orWhere('users.first_name', 'LIKE', '%'.$nombre.'%')
      ->orWhere('users.last_name', 'LIKE', '%'.$nombre.'%')
      ->orderBy('orders.id')
      ->get()
      ->skip($saltar)
      ->take($cantidad)
      ->toJson();
      return $historiales;

}







}
    }




public static function getAnimalsSpecieListPagina($pagina, $especie, $cantidad=9){

    $num = $pagina;
    $int = (int)$num;




    if($cantidad<=0){
        $cantidad=9;
            }
        
            if($int<1){
                $int=1;
            }
        $int--;
$saltar = $int*9;
    

    if($especie=="Todos"){
        return Animal::select('animals.id', 'animals.race', 'animals.species','animals.date_of_birth','animals.description','animals.nickname', 'animals.place_found', 'animals.date_found', 'animals.condition' , 'images_animals.url')
    ->join('images_animals', 'images_animals.id_animal', '=',  'animals.id')
    ->where('animals.id_user', '=', null)
    //->groupBy('animals.id')
    ->get()
    ->skip($saltar)
    ->take($cantidad)
    ->toJson();
    }
    else{
        return Animal::select('animals.id', 'animals.race', 'animals.species','animals.date_of_birth','animals.description','animals.nickname', 'animals.place_found', 'animals.date_found', 'animals.condition' , 'images_animals.url')
    ->join('images_animals', 'images_animals.id_animal', '=',  'animals.id')
    ->where('species', 'like', $especie)
    ->where('animals.id_user', '=', null)
   // ->groupBy('animals.id')
    ->get()
    ->skip($saltar)
    ->take($cantidad)
    ->toJson();
    }
    }

















public static function getAnimalsEspecialesList($pagina=1,  $cantidad=20){
    if($cantidad<=0){
        $cantidad=9;
            }
        
            if($pagina<1){
                $pagina=1;
            }
        $pagina--;
$saltar = $pagina*9;
    return Animal::select('animals.id', 'animals.condition', 'animals.race', 'animals.species','animals.date_of_birth','animals.description','animals.nickname', 'animals.place_found', 'animals.date_found', 'images_animals.url')
    ->join('images_animals', 'images_animals.id_animal', '=',  'animals.id')
    ->whereNotNull('condition')
    ->where('animals.id_user', '=', null)
  //  ->groupBy('animals.id')
    ->get()
    ->skip($saltar)
    ->take($cantidad)
    ->toJson();
    }
    



public  function getAnimalsEspeciales($pagina=1,  $cantidad=9){
    $animales = $this::getAnimalsEspecialesList(1,9);



    return view ('animalesEspeciales')->with('animales', json_decode($animales));
}




public static function CambiarEstadoPedido($id, $valor){
    $order = Order::find($id);
    $order->status = $valor;
    $order->save(); 
}



public static function aceptarPeticion($id,$atributo,$valor){
    $animal = Animal::find($id);
    $animal->$atributo = $valor;
    $animal->save(); 
}


public static function  getPreguntas($pagina=1, $cantidad=5 ){
    if($cantidad<=0){
        $cantidad=5;
            }
        
            if($pagina<1){
                $pagina=1;
            }
        $pagina--;

$saltar = $pagina*5;
$preguntas = Question::select('questions.id AS question_id' ,
'questions.date',
'questions.id_user', 'questions.title', 'questions.description', 'questions.views',
'users.id AS user_id', 'users.first_name', 'users.last_name', 'users.avatar' , 'users.badge_selected', 'badges.id', 'badges.icon', 'badges.description AS textobadge')
->join('users', 'users.id', 'questions.id_user')
->join('badges', 'users.badge_selected', 'badges.id')
->get()
->skip($saltar)
->take($cantidad)
->toJson();




$pregunta= json_decode($preguntas);

$array = (array) $pregunta;





$iZero = array_values($array);



for ($i=0; $i < count($iZero); $i++) { 


    $count = Answer::where('id_question','=',$iZero[$i]->question_id)->count();
  
$iZero[$i]->respuestas=$count;
}









return $iZero;

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





 

    public static function  getAllCategory(){
        return Category::all();
    }



    



    public static function historialUsuarioPedidos(){
  
        $historiales = User::select('lines.id_order','orders.payment_methods','orders.total_price','products.price','orders.date_order','lines.quantity','products.name')
            ->join('orders','users.id','=','orders.id_user')
            ->join('lines','orders.id','=','lines.id_order')
            ->join('products','lines.id_product','=','products.id')
            ->where('orders.id',Auth::user()->id)
            ->get();
        return $historiales;
    }
   


    public static function postOrder(Request $request){

        if(self::comprobarCampos("descuento", $request->codigoDescuentoCantidad)==0){
       
            return response()->json(
                [  
                    'success'=>false,
                    'message'=>'Campo Erroneo',
                  ]
                );
        }

        if(self::comprobarCampos("total_price", $request->total_price)==0){
            return response()->json(
                [  
                    'success'=>false,
                    'message'=>'Campo Erroneo',
                  ]
                );
        }

        if(self::comprobarCampos("payment_method", $request->payment_method)==0){
            return response()->json(
                [  
                    'success'=>false,
                    'message'=>'Campo Erroneo',
                  ]
                );
        }

        if(self::comprobarCampos("street", $request->street)==0){
            return response()->json(
                [  
                    'success'=>false,
                    'message'=>'Campo Erroneo',
                  ]
                );
        }
        if(self::comprobarCampos("number", $request->number)==0){
            return response()->json(
                [  
                    'success'=>false,
                    'message'=>'Campo Erroneo',
                  ]
                );
        }

        if(self::comprobarCampos("postal_code", $request->postal_code)==0){
            return response()->json(
                [  
                    'success'=>false,
                    'message'=>'Campo Erroneo',
                  ]
                );
        }

        if(self::comprobarCampos("location", $request->location)==0){
            return response()->json(
                [  
                    'success'=>false,
                    'message'=>'Campo Erroneo',
                  ]
                );
        }
        if(self::comprobarCampos("province", $request->province)==0){
            return response()->json(
                [  
                    'success'=>false,
                    'message'=>'Campo Erroneo',
                  ]
                );
        }

        if(self::comprobarCampos("country", $request->country)==0){
            return response()->json(
                [  
                    'success'=>false,
                    'message'=>'Campo Erroneo',
                  ]
                );
        }

        if(self::comprobarCampos("way", $request->way)==0){
            return response()->json(
                [  
                    'success'=>false,
                    'message'=>'Campo Erroneo',
                  ]
                );
        }
        $column_id =     DB::table('orders')->insertGetId([
'id_user' =>$request->idusuario,
'coupon_id'=>$request->coupon_id,
'descuento'=>$request->codigoDescuentoCantidad,
'total_price'=>$request->total_price,
'payment_method'=>$request->payment_method,
'USPS'=>$request->uspsnumber,
'street'=>$request->street,
'number'=>$request->number,
'postal_code'=>$request->postal_code,
'location'=>$request->location,
'province'=>$request->province,
'country'=>$request->country,
'way'=>$request->way,
        ]);
return response()->json(
  [  
    'success'=>true,
    'message'=>'Data inserted successfully',
    'id'=> $column_id
  ]
  );
    


}

public static  function comprobarCampos($nombreCampo,$valorcampo){
    $correcto=1;
    switch ($nombreCampo) {
        case "id_user":
            if (User::where('id', '=', $valorcampo)->exists()) {
                $correcto=1;
             }
             else $correcto=0;
          break; 
        case "descuento":
     if(preg_match("/[0-9]*$/", $valorcampo)==1){
         $correcto=1;
     } else $correcto=0;
        break;
    case "payment_method":
    if($valorcampo=="Credit card" || $valorcampo=="Debit card" || $valorcampo=="Paypal"){
        $correcto=1;
    }
    else{
        $correcto=0;
    }
     break;
     case "USPS":
        if(preg_match("/[0-9]*$/", $valorcampo)==1){
            $correcto=1;
        } else $correcto=0;
         break;
     case "street":
     if(preg_match("/[a-zA-Z0-9_.-]{3,}/", $valorcampo)==1){
                $correcto=1;
            } else $correcto=0;
             break;
     case "streetnumber":
      if(preg_match("/[a-zA-Z0-9_. -]{3,}/", $valorcampo)==1){
                    $correcto=1;
                } else $correcto=0;
                 break;
                 case "postal_code":
                    if(preg_match("/[0-9]*$/", $valorcampo)==1){
                        $correcto=1;
                    } else $correcto=0;
                     break;
                     case "location":
                        if(preg_match("/[a-zA-Z]{2,}$/", $valorcampo)==1){
                            $correcto=1;
                        } else $correcto=0;
                         break;
                         case "province":
                            if($valorcampo!="Choose..."){
                                $correcto=1;
                            } else $correcto=0;
                             break;
                             case "country":
                                if($valorcampo!="Choose..."){
                                    $correcto=1;
                                } else $correcto=0;
                                 break;
                                 case "way":
                                    if($valorcampo!="Elegir..." || $valorcampo!="Avenida" ||$valorcampo!="Bulevar" ||$valorcampo!="calle" || $valorcampo!="Plaza"){
                                        $correcto=1;
                                    } else $correcto=0;
                                     break;                    
                 case "price":
                    if(preg_match("/[0-9]*$/", $valorcampo)==1){
                        $correcto=1;
                    } else $correcto=0;
                     break;                  
                 case "quantity":
                    if(preg_match("/[0-9]*$/", $valorcampo)==1){
                        $correcto=1;
                    } else $correcto=0;
                     break;
        default:
        $correcto=1;
      }
    return $correcto;
    } 

    public static function postLinea(Request $request){


        $column_id =DB::table('lines')->insertGetId([
'id_order' =>$request->id_order,
'id_product'=>$request->id_product,
'price'=>$request->price,
'quantity'=>$request->quantity,

        ]);
$product = new Product;
$product->where('id', '=', $request->id_product)->decrement('stock', $request->quantity);
return response()->json(
  [  
    'success'=>true,
    'message'=>'Data inserted successfully',
    'id'=> $column_id
  ]
  );
    }

    public static function PostPeso(Request $request){
        $column_id =DB::table('weights')->insertGetId([
'id_animal' =>$request->idanimal,
'kg'=>$request->cantidadpeso,
'date'=>$request->fechapeso,
        ]);

        

return response()->json(
  [  
    'success'=>true,
    'message'=>'Data inserted successfully',
    'id'=> $column_id
  ]
  );
    }



    public static function PostVacuna(Request $request){
        $column_id =DB::table('vaccinations')->insertGetId([
'id_animal' =>$request->idanimal,
'id_vaccine'=>$request->nombre_vacuna,
'date'=>$request->datevacuna,
        ]);

        

return response()->json(
  [  
    'success'=>true,
    'message'=>'Data inserted successfully',
    'id'=> $column_id
  ]
  );
    }


    public static function postAnimal(Request $request){



$valorcondition="";

if($request->condition==""){
$valorcondition=null;
}
else{

    $valorcondition=$request->condition;
}


        $column_id =DB::table('animals')->insertGetId([
'race' =>$request->race,
'species'=>$request->species,
'gender'=>$request->gender,
'date_of_birth'=>$request->date_of_birth,
'description'=>$request->description,
'health'=>$request->health,
'nickname'=>$request->nickname,
'place_found'=>$request->place_found,
'size'=>$request->size,
'date_found'=>$request->date_found,
'condition'=>$request->valorcondition,
        ]);



        $column_id2 =DB::table('images_animals')->insertGetId([          
            'id_animal' =>$column_id,
            'url'=>$request->imagen,                         
                    ]);







return response()->json(
  [  
    'success'=>true,
    'message'=>'Data inserted successfully',
    'id'=> $column_id
  ]
  );
    }


 
            public static function postProducto(Request $request){



        
                
                
                        $column_id =DB::table('products')->insertGetId([
                'stock' =>$request->stock,
                'price'=>$request->price,
                'name'=>$request->name,
                'description'=>$request->description,
                'image'=>$request->valorinput,
                        ]);
                
      return response()->json(
                  [  
                    'success'=>true,
                    'message'=>'Data inserted successfully',
                    'id'=> $column_id
                  ]
                  );
                    }
                











    public static function postDireccion(Request $request){
        $column_id =DB::table('addresses')->insertGetId([
            'street'=>$request->street,
            'number'=>$request->number,
            'postal_code'=>$request->postal_code,
            'location'=>$request->location,
            'province'=>$request->province,
            'country'=>$request->country,
            'way'=>$request->way,
            'id_user'=>$request->idusuario,
        ]);
return response()->json(
  [  
    'success'=>true,
    'message'=>'Data inserted successfully',
    'id'=> $column_id
  ]
  );
    }

    public static function postInsignia(Request $request){
        $column_id =DB::table('awards')->insertGetId([
            'id_user'=>$request->iduser,
            'id_badge'=>$request->idbadge,
 ]);
            return response()->json(
  [  
    'success'=>true,
    'message'=>'Data inserted successfully',
    'id'=> $column_id
  ]
  );


    
    //crearDireccion
}


public static function postDonacion(Request $request){

if($request->anonimo=="Si"){
    $column_id =DB::table('donations')->insertGetId([
   
        'reason'=>$request->reason,
        'ammount'=>$request->dinerodonar,
        'payment_method'=>$request->paymentmethod,
]);
}

else{
    $column_id =DB::table('donations')->insertGetId([
        'id_user'=>$request->userid,
        'reason'=>$request->reason,
        'ammount'=>$request->dinerodonar,
        'payment_method'=>$request->paymentmethod,
]);
}





$premiocomprobar = Award::select('awards.id', 'awards.id_user', 'awards.id_badge')
->where('awards.id_badge', '=' , 2)
->where('id_user', '=',$request->userid )
->get();

$awardsarray = json_decode($premiocomprobar);


if(count($awardsarray)==1){
    
    return response()->json(
        [  
        'success'=>true,
        'message'=>'Data inserted successfully',
        'id'=> $column_id
        ]
        );


}
else{
    $column_id =DB::table('awards')->insertGetId([
        'id_user'=>$request->userid,
        'id_badge'=>2,
    ]);
       
    return response()->json(
        [  
        'success'=>true,
        'message'=>'Data inserted successfully',
        'id'=> $column_id
        ]
        );
    
}








//crearDireccion
}













}

///api/products()
