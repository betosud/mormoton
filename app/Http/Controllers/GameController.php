<?php

namespace mormoton\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use mormoton\answers;
use mormoton\anwergame;
use mormoton\books;
use mormoton\game;
use mormoton\Http\Requests;
use mormoton\level;
use mormoton\libros;
use mormoton\question;
use mormoton\questionsgame;




class GameController extends Controller
{
    public function newgame(Request $request)
    {
        $combos['books']= books::where('id',1)->lists('name','id');
        
        
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
        $endgame=new Carbon();
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
        $game['endtime']=$endgame->addSecond($game->totalminutos);
        $game->save();
        //guardar las preguntas asignadas

        foreach ($answergame as $guardarquestion){
            $questiongamesave=new questionsgame(['idgame'=>$game->id,'idquestion'=>$guardarquestion[0]->idquestion,'correcta'=>0]);
            $questiongamesave->save();
        }


        return view('games.playin',compact('questions','totalquestions','answergame','game'));
    }
        
    
    
    
    
    
    
    
    
    public function score($id,$token){
            $game=game::findorfail($id);
        $urlmormoton=url('score',[$id,$token]);

//        $shared=Share::facebook($urlmormoton, $game->medalladsc,asset('imagenes/'.$game->medalla));
//        $shared= Share::with('facebook', $urlmormoton, $game->medalladsc, asset('imagenes/'.$game->medalla));

//        dd($shared);
            if($game->token==$token) {

                return view('games.finish', compact('game','urlmormoton'));
            }
            else {
                abort(403);
            }
        }


    public function savegame(Request $request){

         //verificarpreguntas
        
        $idgame=$request->id;

        $questionsgame=questionsgame::where('idgame',$idgame)->get();
        $aciertos=0;

        foreach ($questionsgame as $question){
            if(isset($request[$question->idquestion])){
                $answerid=$request[$question->idquestion];

                $answer=answers::findorfail($answerid);

                if($answer->correcta==1){
                    $question['correcta']=1;
                    $question->save();
                    $aciertos++;
                }
            }

        }


        $game=game::findorfail($idgame);
        $game['endtime']=new Carbon();

        $game['score']=$aciertos;
        $game->save();
//        dd($game);
        return redirect()->route('score',[$game->id,$game->token]);
//        dd($score);


    }
    public function games(Request $request){
        $games=game::where('iduser',$request->user()->id)->orderby('id','desc')->paginate(15);
        return view('games.games',compact('games'));
    }


    public function study(Request $request,$id){
        //obtener juego
        $game=game::findorfail($id);

$retroalimentacion=array();
        if($game->iduser === $request->user()->id){
            $preguntasjuego=questionsgame::where('idgame',$game->id)->get();

            foreach ($preguntasjuego as $pregunta){
                $question=question::findorfail($pregunta->idquestion);
                $answer=answers::where('idquestion',$pregunta->idquestion)->where('correcta',1)->get();
                $canonico=books::findorfail($answer[0]->canonico);
                $libro=libros::findorfail($answer[0]->libro);
                $capitulo=$answer[0]->capitulo;
                $versiculos=$answer[0]->versiculos;
                
                $reflink="https://www.lds.org/scriptures/";
                $reflink.=$canonico->url."/".$libro->url."/".$capitulo.".".$versiculos;
                $reflink.="?lang=spa#10";
                $retroalimentacion[$question->id]=array('questions'=>$question->question,'answer'=>$answer[0]->answer,'ref'=>$reflink);


            }
            dd($retroalimentacion);
        }
        else{
            abort(403);
        }
        //obtener referencias del juego

    }

}
