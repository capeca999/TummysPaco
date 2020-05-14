<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use Auth;
use DB;
use App\like_question;
use App\like_answer;
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
        $likespregunta= self::getlikespregunta($id);
        $likesrespuesta= self::getlikesrespuesta($id);

        echo "<pre>";
       var_dump(json_decode($hilo));
        echo "</pre>";
        die;
        
        
        $data =  array();
        $data['hilo']  =   json_decode($hilo, true);
        $data['pregunta']     =   json_decode($pregunta, true);
        $data['likespregunta'] = $likespregunta;
        $data['likesrespuesta'] =  json_decode($likesrespuesta, true);





        return view('thread',compact("data"));
    }

//    return $view->with('persons', $persons)->with('ms', $ms);






public static function getlikespregunta($id){
    $column_id = like_question::select('id_user', 'id_question')
    ->where('id_question', '=', $id)
    ->where('id_user' , '=', Auth::user()->id)
->get()
->toJson();



if( ( strlen($column_id))==2 ){

    return "notliked";

}
else{
    return "liked";
} 

}



    public static function getidpregunta($id){

        $views = new Question;
        $views->where('id', '=', $id)->increment('views', 1);
    
        $preguntas = Question::select('questions.id AS question_id' ,
        'questions.date',
         'questions.id_user', 'questions.title', 'questions.description', 'questions.likes', 'questions.views',
         'users.id AS user_id', 'users.first_name', 'users.last_name', 'users.created_at' )
         ->where('questions.id', '=', $id)
        ->join('users', 'users.id', 'questions.id_user')
        ->get()
        ->toJson();
  
    return $preguntas;
    }
    


    public static function likequestion($id){
        $column_id =DB::table('like_questions')->insertGetId([
            'id_user' =>Auth::user()->id,
            'id_question'=>$id,        
                    ]);

        $like = new Question;
        $like->where('id', '=', $id)->increment('likes', 1);

    return $column_id;
    }



    public static function quitarlikequestion($id){

        like_question::where('id_user', Auth::user()->id)->where('id_question', $id)->delete();

  

        $like = new Question;
        $like->where('id', '=', $id)->decrement('likes', 1);

    return $like;
    }




    



    //Route::get('/darLikeAnswer/{id}/{idquestion}', 'PreguntasController@likeanswer');


    public static function likeanswer($idquestion,$idanswer){




        $column_id =DB::table('like_answers')->insertGetId([
            'id_user' =>Auth::user()->id,
            'id_question'=>$idquestion,  
            'id_answer'=>$idanswer      
                    ]);

        $like = new Answer;
        $like->where('id', '=', $idanswer)->increment('likes', 1);

    return $column_id;
    }
    




    public static function quitarlikeanswer($idquestion,$idanswer){
        like_answer::where('id_user', Auth::user()->id)->where('id_question', $idquestion)->where('id_answer', $idanswer)->delete();
        $like = new Answer;
        $like->where('id', '=', $idanswer)->decrement('likes', 1);
    return $like;
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

$threads = Answer::select('answers.id AS answer_id','answers.id_question', 'answers.id_user', 'answers.fecha', 'answers.title', 'answers.description', 'answers.likes' , 'answers.views','users.created_at', 'users.first_name',  'users.id AS user_id','users.last_name')
->join('users', 'users.id', 'answers.id_user')
->where('answers.id_question', '=', $id)
->get()
->toJson();
$arraythread= json_decode($threads);



$column_id = like_answer::select('id_answer AS answerliked')
    ->where('id_user' , '=', Auth::user()->id)
    ->where('id_question', '=', $id)
->get()
->toJson();
$arraylikes= json_decode($column_id);




$encontrado=false;


for ($cont1=0; $cont1 < count($arraythread) ; $cont1++) {
    

    $encontrado=false;
for ($cont2=0; $cont2 < count($arraylikes) ; $cont2++) { 
 
    if($arraythread[$cont1]->answer_id==$arraylikes[$cont2]->answerliked){
$arraythread[$cont1]->liked=true;

$encontrado=true;


    }





}


if($encontrado==false){
 
    $arraythread[$cont1]->liked=false;

}


}

echo "<pre>";
echo var_dump($arraythread);
echo "</pre>";
die; 


/*
$arraymalo= json_decode($threads);

$arraymalo[0]->idpreguntaliked =
echo "<pre>";
echo var_dump($arraymalo[0]->answer_id);
echo "</pre>";
die;
*/



return $threads;


}



public static function getlikesrespuesta($id){
    $column_id = like_answer::select('id_answer AS answerliked')
    ->where('id_user' , '=', Auth::user()->id)
    ->where('id_question', '=', $id)
->get()
->toJson();

return $column_id;


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
