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
            'answer'=>'required'
        );


        $this->validate($request,$rules);
        
        
        $answer=new answers($request->all());
        $answer->save();
        $request['idrespuesta']=$answer->id;
        $request['user_id']=$request->user()->id;

        $question=new question($request->all());
        $question->save();

        
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
