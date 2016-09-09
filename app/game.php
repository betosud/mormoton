<?php

namespace mormoton;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class game extends Model
{
    protected $table = 'games';
    protected $dates = ['deleted_at'];

    protected $fillable = ['id', 'iduser', 'typelevel', 'timestart', 'endtime', 'score', 'token'];


    public function getTypeleveldscAttribute()
    {
        $type = level::findorfail($this->typelevel);
        return $type->nombre;
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

    public function getNamegamerAttribute()
    {
        $user = User::findorfail($this->iduser);


        return $user->name;
    }

    public function getMedallaAttribute()
    {
        if ($this->score > 0 && $this->socre <= 3.33) {
            $medalla="medalla3.png";
        }
        elseif ($this->score > 3.33 && $this->socre <= 6.66){
            $medalla="medalla2.png";
        }
        elseif ($this->score > 6.66 && $this->socre <= 10){
            $medalla="medalla1.png";
        }
        return $medalla;
    }
}