<?php

namespace mormoton;

use Illuminate\Database\Eloquent\Model;

class libros extends Model
{
    protected $table = 'libros';


    protected $fillable = ['id','idbook','name','url','capitulos'];
}
