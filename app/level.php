<?php

namespace mormoton;

use Illuminate\Database\Eloquent\Model;

class level extends Model
{
    protected $table = 'typelevel';


    protected $fillable = ['id','nombre','descripcion','numquestions','duration'];
}
