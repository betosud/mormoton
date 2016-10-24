<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();



//administracion de preguntas
Route::get('questions',['uses'=>'QuestionsController@Index','as'=>'questions','middleware'=>'auth','middleware' => 'permission:view.question']);
Route::post('storequestions',['uses'=>'QuestionsController@store','as'=>'storequestions','middleware'=>'auth','middleware' => 'permission:add.question']);
Route::get('listarquestion',['uses'=>'QuestionsController@listar','as'=>'listarquestion','middleware'=>'auth','middleware' => 'permission:view.question']);
Route::get('editar/{id}',['uses'=>'QuestionsController@editar','as'=>'editar','middleware'=>'auth','middleware' => 'permission:edit.question']);
Route::put('actualizaquestion/{id}',['uses'=>'QuestionsController@actualiza','as'=>'actualizaquestion','middleware'=>'auth','middleware' => 'permission:edit.question']);


//combos
Route::get('combos/{nombre}/{valor}',['uses'=>'CombosController@listar','as'=>'combos','middleware'=>'auth']);

Route::get('/home', 'HomeController@index');




//games
Route::get('newgame',['uses'=>'GameController@newgame','as'=>'newgame','middleware'=>'auth','middleware']);
Route::post('gamemormoton',['uses'=>'GameController@store','as'=>'gamemormoton','middleware'=>'auth','middleware']);
Route::post('savegame',['uses'=>'GameController@savegame','as'=>'savegame','middleware'=>'auth','middleware']);
Route::get('score/{id}/{token}',['uses'=>'GameController@score','as'=>'score']);
Route::get('games',['uses'=>'GameController@games','as'=>'games']);


//resultados
Route::get('estudia/{id}',['uses'=>'GameController@study','as'=>'estudia','middleware'=>'auth','middleware']);

//share


Route::get('/facebook', function()
{
    return Share::load('http://www.example.com', 'My example')->facebook();
});
