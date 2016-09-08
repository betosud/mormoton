<?php

namespace mormoton\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use mormoton\answers;
use mormoton\books;
use mormoton\game;
use mormoton\Http\Requests;
use mormoton\level;
use mormoton\question;

class GameController extends Controller
{
    public function newgame(Request $request)
    {
        $combos['books']= books::lists('name','id');
        $combos['level']= level::lists('descripcion','id');
        return view('games.newgame',compact('combos'));
    }
    function searchquestions($typelevel,$idbook){
        $typeleveldsc=level::findorfail($typelevel);
        $questions=array();
        $totalpreguntas=0;
        $tope=question::count();
//        dd($tope)
        while($totalpreguntas<$typeleveldsc->numquestions){
                $pregunta="";
                $aleatorio=rand(1,$tope);
                $pregunta=question::findorfail($aleatorio);
                if($pregunta->idbook==$idbook and !in_array($pregunta->id,$questions)){
                    $questions[]=$pregunta->id;
                    $totalpreguntas++;
                }

        }

        foreach ($questions as $question){
            $questionsgame[]= question::findorfail($question);
        }
return $questionsgame;

    }

    public function store(Request $request){
        $request['iduser']=$request->user()->id;
        $request['timestart']=new Carbon();
        $request['token']=str_random(30);


        $rules=array('idbook'=>'required',
            'typelevel'=>'required',
            'timestart'=>'required',
            'iduser'=>'required',
            'token'=>'required'

        );
        $this->validate($request,$rules);


        $questions=$this->searchquestions($request->typelevel,$request->idbook);

        $totalquestions=0;

        foreach ($questions as $question){
            $answers=answers::where('idquestion',$question->id)->get();
            $revueltas=array();
            $total=count($answers);
//        $revueltas=array();
                    while($total>0){
        //        for($i=0;$i<4;$i++){
                        $answersaux=array();
                        $rand=rand(0,$total-1);
                        $revueltas[]=$answers[$rand];

                        unset($answers[$rand]);
                        foreach ($answers as $answer){
                            $answersaux[]=$answer;
                        }
                        $answers=$answersaux;

                    if (isset($answers))
                        $total=count($answers);
                    else
                        $total=0;


                    }
            $answergame[]=$revueltas;
        }
        $game=new game($request->all());
        $game->save();
        //guardar las preguntas asignadas

        return view('games.playin',compact('questions','totalquestions','answergame','game'));
    }



    public function savegame(Request $request){
        dd($request->all());
    }
}
