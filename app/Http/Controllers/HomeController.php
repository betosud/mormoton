<?php

namespace mormoton\Http\Controllers;

use mormoton\game;
use mormoton\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $maxgame=game::where('iduser',$request->user()->id)->orderby('score','desc')->first();


        if($maxgame==null){
            return redirect()->route('newgame');
        }
        else{
            return view('home',compact('maxgame'));
        }
//        dd($maxgame);



    }
}
