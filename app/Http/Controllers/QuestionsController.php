<?php

namespace mormoton\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use mormoton\answers;
use mormoton\books;
use mormoton\Http\Requests;
use mormoton\libros;
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
    public function editar($id){
        $combos=array();
        $combos['books']=books::lists('name','id');
        $combos['libros']=libros::lists('name','id');
        $question=question::findorfail($id);
        $answers=answers::where('idquestion',$question->id)->get();

        return view('questions.edit',compact('combos','question','answers'));

//        dd($answers);

    }
    public function actualiza(Request $request,$id){
        $question=question::findorfail($id);


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
        $question->fill($request->all());
        $question->save();

        //buscar respuestas y actualizar
        $answers=answers::where('idquestion',$question->id)->get();

        $correcta=$answers[0];
        $correcta->fill($request->all());
        $correcta->save();


        foreach($request->all() as $key => $value) {
            if ($key=='option1') {
                $opcion=$answers[1];
                $opcion->fill(array('answer'=>$request->option1,'libro'=>$request->libro,'capitulo'=>$request->capitulo,'versiculos'=>$request->versiculos));

                $opcion->save();
            }
            if ($key=='option2') {
                $opcion=$answers[2];
                $opcion->fill(array('answer'=>$request->option2,'libro'=>$request->libro,'capitulo'=>$request->capitulo,'versiculos'=>$request->versiculos));

                $opcion->save();
            }
            if ($key=='option3') {
                $opcion=$answers[3];
                $opcion->fill(array('answer'=>$request->option3,'libro'=>$request->libro,'capitulo'=>$request->capitulo,'versiculos'=>$request->versiculos));

                $opcion->save();
            }
        }


        \Session::flash('message','Se actualizo la Pregunta '.$question->id);
        return redirect()->route('questions');

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
                $opcion=new answers(array('idquestion'=>$question->id,'answer'=>$value,'correcta'=>0,'canonico'=>$request['canonico'],'libro'=>$request['libro'],'capitulo'=>$request['capitulo'],'versiculos'=>$request['versiculos']));
                $opcion->save();
            }
            if ($key=='option2') {
                $opcion=new answers(array('idquestion'=>$question->id,'answer'=>$value,'correcta'=>0,'canonico'=>$request['canonico'],'libro'=>$request['libro'],'capitulo'=>$request['capitulo'],'versiculos'=>$request['versiculos']));
                $opcion->save();
            }
            if ($key=='option3') {
                $opcion=new answers(array('idquestion'=>$question->id,'answer'=>$value,'correcta'=>0,'canonico'=>$request['canonico'],'libro'=>$request['libro'],'capitulo'=>$request['capitulo'],'versiculos'=>$request['versiculos']));
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
