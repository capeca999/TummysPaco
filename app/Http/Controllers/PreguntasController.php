<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use Auth;
use DB;
use App\Badge;
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
//Question::count();


    public static function getthread($id){
        $hilo = self::getidthread($id);
        $pregunta = self::getidpregunta($id);
        $data =  array();
        $data['hilo']  =   $hilo;
        $data['pregunta']     =   $pregunta;
        return view('thread',compact("data"));
    }

//    return $view->with('persons', $persons)->with('ms', $ms);

/*
public static function getlikesrespuesta($id){
    $column_id = like_answer::select('id_answer AS answerliked')
    ->where('id_user' , '=', Auth::user()->id)
    ->where('id_question', '=', $id)
->get()
->toJson();

return $column_id;
}

*/

public static function getidpregunta($id){

    $views = new Question;
    $views->where('id', '=', $id)->increment('views', 1);

    $preguntas = Question::select('questions.id AS question_id' ,
    'questions.date',
     'questions.id_user', 'questions.title', 'questions.description AS question_description', 'questions.likes', 'questions.views',
     'users.id AS user_id', 'users.first_name', 'users.last_name', 'users.created_at', 'users.avatar', 'users.badge_selected','badges.id', 'badges.icon', 'badges.description'  )
     ->where('questions.id', '=', $id)
    ->join('users', 'users.id', 'questions.id_user')
    ->join('badges', 'badges.id', 'users.badge_selected')
    ->get()
    ->toJson();




    $preguntas= json_decode($preguntas);

//$arraythread[$cont1]->liked=true;


    $column_id = like_question::select('id_user', 'id_question')
    ->where('id_question', '=', $id)
    ->where('id_user' , '=', Auth::user()->id)
->get()
->toJson();    
if( ( strlen($column_id))==2 ){
    $preguntas[0]->liked=false;
   }
else{
    $preguntas[0]->liked=true;

} 
return $preguntas;
}


public static function getidthread($id){



  
$threads = Answer::select('answers.id AS answer_id','answers.id_question', 'answers.id_user', 'answers.fecha', 'answers.title', 
'answers.description AS answer_description', 'answers.likes' , 'answers.views','users.created_at', 'users.first_name', 'users.avatar', 'users.id AS user_id','users.last_name',
 'users.badge_selected','badges.id', 'badges.icon', 'badges.description')
->join('users', 'users.id', 'answers.id_user')
->join('badges', 'badges.id', 'users.badge_selected')
->orderBy('answers.fecha', 'DESC')
->where('answers.id_question', '=', $id)
->get()
->toJson();
$arraythread= json_decode($threads);
$column_id = like_answer::select('id_answer AS answerliked')
    ->where('id_user' , '=', Auth::user()->id)
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
return $arraythread;
}





  


    public static function getlikespregunta($id){
   
    
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
            'id_answer'=>$idanswer      
                    ]);

        $like = new Answer;
        $like->where('id', '=', $idanswer)->increment('likes', 1);

    return $column_id;
    }
    




    public static function quitarlikeanswer($idquestion,$idanswer){
        like_answer::where('id_user', Auth::user()->id)->where('id_answer', $idanswer)->delete();
        $like = new Answer;
        $like->where('id', '=', $idanswer)->decrement('likes', 1);
    return $like;
    }















public function preguntas(){
    $preguntas = $this::listarPreguntas(0,5);
    $data =  array();
    $data['cantidad']  =  Question::count();
    $data['preguntas']     =   $preguntas;
    return view('forum',compact("data"));
}


public static function listarPreguntas($pagina=1, $cantidad=5){
    if($cantidad<=0){
        $cantidad=5;
            }
        
            if($pagina<1){
                $pagina=1;
            }
        $pagina--;



$saltar = $pagina*$cantidad;
$preguntas = Question::select('questions.id AS question_id' ,
'questions.date',
 'questions.id_user', 'questions.title', 'questions.description', 'questions.views',
 'users.id AS user_id', 'users.first_name', 'users.last_name', 'users.avatar', 'users.badge_selected', 'badges.id', 'badges.icon')
->join('users', 'users.id', 'questions.id_user')
->join('badges', 'users.badge_selected', 'badges.id')
->get()
->skip($saltar)
->take($cantidad)
->toJson();

//$count = Answer::where('id_question','=','1')->count();


$pregunta= json_decode($preguntas);


for ($i=0; $i < count($pregunta); $i++) { 



    $now = time(); // or your date as well
    $your_date = strtotime($pregunta[$i]->date);
    $datediff = $now - $your_date;
    
    $fechadiferencia = round($datediff / (60 * 60 * 24));
    
    $pregunta[$i]->fechadiferencia =  $fechadiferencia;

    $count = Answer::where('id_question','=',$pregunta[$i]->question_id)->count();
  
$pregunta[$i]->respuestas=$count;
}



/*

$badges = Badge::select('badges.id', 'badges.name', 'badges.description')
->get()
->skip($saltar)
->take($cantidad)
->toJson();

*/


return $pregunta;
}




public  function crearrespuesta(Request $request){
    $input = $request->all();
    DB::table('answers')->insert([
        ['id_user' => Auth::user()->id,  'id_question' => $_POST['id_question'], 'description' => $_POST['description'], 'fecha' => $_POST['date'] , 'title' => $_POST['title'], 'description' => $_POST['description']]
     
    ]);
    return response()->json(['success'=>'Got Simple Ajax Request.']);
}










public  function crearquestion(Request $request){
    $input = $request->all();
    DB::table('questions')->insert([
        ['id_user' => Auth::user()->id,  'title' => $_POST['title'], 'description' => $_POST['description'], 'date' => $_POST['date']]
     
    ]);
    return response()->json(['success'=>'Got Simple Ajax Request.']);
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
