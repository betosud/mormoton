<?php

namespace mormoton\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use mormoton\answers;
use mormoton\books;
use mormoton\Http\Requests;
use mormoton\question;

class QuestionsController extends Controller
{

    public function Index(Request $request)
    {
        $questions=array();
        $combos=array();
        $combos['books']=books::lists('name','id');
//        dd($combos);
        return view('questions.questions',compact('questions','combos'));
    }


    public function store(Request $request){
        $rules=array('idbook'=>'required',
            'question'=>'required',
            'answer'=>'required',
            'libro'=>'required',
            'capitulo'=>'required',
            'versiculos'=>'required',
            'option1'=>'required',
            'option2'=>'required',
            'option3'=>'required',
        );


        $this->validate($request,$rules);
        $request['user_id']=$request->user()->id;
        $question=new question($request->all());
        $question->save();

        $request['idquestion']=$question->id;
        $request['correcta']=1;
        $request['canonico']=$request->idbook;

        $respuestacorrecta=new answers($request->all());
        $respuestacorrecta->save();




        //guardar opciones

        foreach($request->all() as $key => $value) {
            if ($key=='option1') {
                $opcion=new answers(array('idquestion'=>$question->id,'answer'=>$value,'correcta'=>0,'canonico'=>$request['canonico'],'libro'=>$request['libro'],'versiculos'=>$request['versiculos']));
                $opcion->save();
            }
            if ($key=='option2') {
                $opcion=new answers(array('idquestion'=>$question->id,'answer'=>$value,'correcta'=>0,'canonico'=>$request['canonico'],'libro'=>$request['libro'],'versiculos'=>$request['versiculos']));
                $opcion->save();
            }
            if ($key=='option3') {
                $opcion=new answers(array('idquestion'=>$question->id,'answer'=>$value,'correcta'=>0,'canonico'=>$request['canonico'],'libro'=>$request['libro'],'versiculos'=>$request['versiculos']));
                $opcion->save();
            }
        }


        
    }
    public function listar(Request $request){
        if(Auth::user()->is('admin')){
            $questions =question::paginate(30);
        }
        else{
            $questions =question::byuser($request->user()->id)->paginate(30);
        }

       

        
        return view('layouts.questions',compact('questions'));
    }
}
