<?php

namespace mormoton\Http\Controllers;

use Illuminate\Http\Request;

use mormoton\Http\Requests;
use mormoton\libros;

class CombosController extends Controller
{
    public function listar($nombre,$valor){

        if($nombre=='libros'){
            $libros=libros::where('idbook',$valor)->lists('name','id');
            return response()->json($libros);
        }
        elseif ($nombre=='capitulos'){
            $libro=libros::findorfail($valor);
            return response($libro->capitulos);
        }
//        switch ($nombre){
//            case 'libros':{
//                $libros=libros::where('idbook',$valor)->lists('name','id');
//
//                return response()->json($libros);
//                break;
//            }
//            case 'capitulos':{
//                $libros=libros::findorfail($valor)->get();
//
//                return response($libros);
//                break;
//            }
//        }
    }
}
