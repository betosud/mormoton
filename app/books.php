<?php

namespace mormoton;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    protected $table = 'books';


    protected $fillable = ['id','name'];

}
