<?php

namespace mormoton\Http\Controllers;

use Illuminate\Http\Request;

use mormoton\books;
use mormoton\Http\Requests;

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
        $rules=array('book'=>'required',
            'question'=>'required',
            'respuesta'=>'required'
        );


        $this->validate($request,$rules);
    }
}
