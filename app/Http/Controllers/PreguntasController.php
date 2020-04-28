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





public function indexJugetesDias(){
    $preguntas = $this::listarPreguntasHoy(1,10);

    return view('preguntasRespuestas')->with('preguntas', json_decode($preguntas, true));
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


$preguntas = Question::select('questions.id', 'questions.id_user', DB::raw("DATE_FORMAT(questions.date, '%Y-%m-%d')"), 'questions.title', 'questions.description', 'users.id', 'users.first_name', 'users.last_name')
->join('users', 'users.id', 'questions.id_user')
->whereRaw("DATE(questions.date) = CURDATE()")
->get()
->skip($saltar)
->take($cantidad)
->toJson();






}


}
