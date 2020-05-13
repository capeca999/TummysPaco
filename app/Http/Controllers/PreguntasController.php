<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use DB;
class PreguntasController extends Controller
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

/*


public static function getAnimalID($id){

$animales = Animal::select('animals.id','animals.id_user','animals.race','animals.species','animals.date_of_birth','animals.description','animals.health','animals.nickname','animals.place_found','animals.size','animals.date_found','animals.condition','animals.gender', 'images_animals.url')
->join('images_animals','images_animals.id_animal','animals.id')
->where('animals.id', '=', $id)
->get()
->toJson();

<?php dd($preguntas["first_name"]); ?>
return view('animalDetalles')->with('animales', json_decode($animales));

}


        echo "<pre>";
        echo var_dump($data);
        echo "</pre>";
        die;


*/


    public static function getthread($id){




        $hilo = self::getidthread(1,10,$id);
        $pregunta = self::getidpregunta($id);



        $data =  array();
        $data['hilo']  =   json_decode($hilo, true);
        $data['pregunta']     =   json_decode($pregunta, true);


      
        return view('thread',compact("data"));
    }

//    return $view->with('persons', $persons)->with('ms', $ms);


    public static function getidpregunta($id){
        $preguntas = Question::select('questions.id AS question_id' ,
        'questions.date',
         'questions.id_user', 'questions.title', 'questions.description', 'questions.likes', 'questions.views',
         'users.id AS user_id', 'users.first_name', 'users.last_name', 'users.created_at')
         ->where('questions.id', '=', $id)
        ->join('users', 'users.id', 'questions.id_user')
        ->get()
        ->toJson();
    return $preguntas;
    }
    








public static function getidthread($pagina=1, $cantidad=10,$id){


    if($cantidad<=0){
        $cantidad=10;
            }
        
            if($pagina<1){
                $pagina=1;
            }
        $pagina--;
$saltar = $pagina*10;

$threads = Answer::select('answers.id AS answer_id','answers.id_question', 'answers.id_user', 'answers.fecha', 'answers.title', 'answers.description', 'answers.views','users.created_at', 'users.first_name',  'users.id AS user_id','users.last_name')
->join('users', 'users.id', 'answers.id_user')
->where('answers.id_question', '=', $id)
->get()
->toJson();
return $threads;


}








public function preguntas(){
    $preguntas = $this::listarPreguntas(1,10);
    return view('forum')->with('preguntas', json_decode($preguntas, true));
}


public static function listarPreguntas($pagina=1, $cantidad=10){
    if($cantidad<=0){
        $cantidad=10;
            }
        
            if($pagina<1){
                $pagina=1;
            }
        $pagina--;
$saltar = $pagina*10;


$preguntas = Question::select('questions.id AS question_id' ,
'questions.date',
 'questions.id_user', 'questions.title', 'questions.description', 'questions.views',
 'users.id AS user_id', 'users.first_name', 'users.last_name')
->join('users', 'users.id', 'questions.id_user')
->get()
->skip($saltar)
->take($cantidad)
->toJson();



return $preguntas;


}




public static function listarPreguntasHoy($pagina=1, $cantidad=10){


    if($cantidad<=0){
        $cantidad=10;
            }
        
            if($pagina<1){
                $pagina=1;
            }
        $pagina--;
$saltar = $pagina*10;


$preguntas = Question::select('questions.id','questions.date', 'questions.id_user', DB::raw("DATE_FORMAT(questions.date, '%Y-%m-%d')"), 'questions.title', 'questions.description', 'users.id', 'users.first_name', 'users.last_name')
->join('users', 'users.id', 'questions.id_user')
->whereRaw("DATE(questions.date) = CURDATE()")
->get()
->skip($saltar)
->take($cantidad)
->toJson();


return $preguntas;


}


}
