<?php

namespace mormoton;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class game extends Model
{
    protected $table = 'games';
    protected $dates = ['deleted_at'];

    protected $fillable = ['id','idbook', 'iduser', 'typelevel', 'timestart', 'endtime', 'score', 'token','timestart','endtime'];


    public function getTypeleveldscAttribute()
    {
        $type = level::findorfail($this->typelevel);
        return $type->nombre;
    }


    public function getBookNameAttribute()
    {
        $book = books::findorfail($this->idbook);
        return $book->name;
    }
    public function getFechaGameAttribute()
    {
        $explode=explode(' ',$this->timestart);
        $fecha=explode('-',$explode[0]);

        $fecha=Carbon::createFromDate($fecha[0],$fecha[1],$fecha[2]);

        return $fecha->format('Y-M-d');
    }
    public function getNumquestionsAttribute()
    {
        $type = level::findorfail($this->typelevel);
        return $type->numquestions;
    }



    public function getTotalminutosAttribute()
    {

        $type = level::findorfail($this->typelevel);

        return $type->numquestions * $type->duration;
    }
    public function getNiveldscAttribute()
    {

        $type = level::findorfail($this->typelevel);

        return $type->nombre;
    }

    public function getNamegamerAttribute()
    {
        $user = User::findorfail($this->iduser);


        return $user->name;
    }

    public function getMedallaAttribute()
    {
        $type = level::findorfail($this->typelevel);
        $calif=($this->score*10) / $type->numquestions;
        $calif=round($calif,2);
        if ($calif >= 0 && $calif <= 6) {
            $medalla="medalla3.png";
        }
        elseif ($calif > 6 && $calif < 9){
            $medalla="medalla2.png";
        }
        elseif ($calif >= 9 && $calif <= 10){
            $medalla="medalla1.png";
        }
        return $medalla;
    }
    public function getMedalladscAttribute()
    {
        $type = level::findorfail($this->typelevel);
        $calif=($this->score*10) / $type->numquestions;
        $calif=round($calif,2);
        if ($calif >= 0 && $calif <= 6) {
            $medalla="Bronce";
        }
        elseif ($calif > 6 && $calif < 9){
            $medalla="Plata";
        }
        elseif ($calif >= 9 && $calif <= 10){
            $medalla="Oro";
        }
        return $medalla;

    }

    public function getPreguntasAttribute()
    {
        $type = level::findorfail($this->typelevel);
        return $type->numquestions;
    }
    public function getCalificacionAttribute()
    {
        $type = level::findorfail($this->typelevel);
        $calif=($this->score*10) / $type->numquestions;
        $calif=round($calif,2);
        return $calif;
    }
}