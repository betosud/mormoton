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


Route::get('/home', 'HomeController@index');
