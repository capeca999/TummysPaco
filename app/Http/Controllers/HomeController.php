<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Petitions;
 use Exception;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


public function refreshCaptcha(){

        return response()->json(['captcha' => captcha_img()]);
}



public  function ProcesoAdopciónPost(Request $request){

    $petitions = DB::table('petitions')
    ->where('id_animal' ,'=', $_POST['idanimal'])
    ->where('id_user' ,'=',  Auth::user()->id)
    ->limit(1)
    ->get();

    $peticion = count($petitions);

    if($peticion>0){
        return response()->json(['success'=>'Has realizado la petición']);

    }
    else{

    

//ProcesoAdopciónConsultar

    $input = $request->all();
    DB::table('petitions')->insert([
        ['id_user' => Auth::user()->id, 'id_animal' => $_POST['idanimal'], 'name_petition' => $_POST['nombre'], 'email_petition' => $_POST['email'], 'telephone_number' => $_POST['phone'], 'commentary' => $_POST['comments'], 'status' => 'Sended']
     
    ]);
    return response()->json(['success'=>'Got Simple Ajax Request.']);
    }
}


/*

try {
    if (some_bad_condition) {
        throw new Exception('Test error', 123);
    }
    echo json_encode(array(
        'result' => 'vanilla!',
    ));
} catch (Exception $e) {
    echo json_encode(array(
        'error' => array(
            'msg' => $e->getMessage(),
            'code' => $e->getCode(),
        ),
    ));
}

*/

/*
try {
    if (some_bad_condition) {
        throw new Exception('Test error', 123);
    }
    echo json_encode(array(
        'result' => 'vanilla!',
    ));
} catch (Exception $e) {
    echo json_encode(array(
        'error' => array(
            'msg' => $e->getMessage(),
            'code' => $e->getCode(),
        ),
    ));
}

*/

public  function ProcesoAdopciónConsultar(Request $request){

    try{

    if (Petitions::where(['id_animal', '=', $_POST['idanimal']], ['id_user', '=',  Auth::user()->id])->exists()) {
        throw new Exception ("Has realizado la petición con anterioridad", 123);
     }


        $input = $request->all();
        DB::table('petitions')->insert([
            ['id_user' => Auth::user()->id, 'id_animal' => $_POST['idanimal'], 'name_petition' => $_POST['nombre'], 'email_petition' => $_POST['email'], 'telephone_number' => $_POST['phone'], 'commentary' => $_POST['comments'], 'status' => 'Sended']
         
        ]);
        return response()->json(['success'=>'Got Simple Ajax Request.']);

     
   //     return response()->json(['error'=>'Has realizado la petición con anterioridad']);
    }    
catch(Exception $e){
    echo json_encode(array(
        'error' => array(
            'msg' => $e->getMessage(),
            'code' => $e->getCode(),
        ),
    ));
}
 



//ProcesoAdopciónConsultar

    
}



    
}
