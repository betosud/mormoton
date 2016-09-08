<?php

namespace mormoton;

use Illuminate\Database\Eloquent\Model;

class anwergame extends Model
{
    protected $table = 'answergame';
    protected $fillable = ['id','idgame','idquestion','correcta'];
}
