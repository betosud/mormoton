<?php

namespace mormoton;

use Illuminate\Database\Eloquent\Model;

class questionsgame extends Model
{
    protected $table = 'questionsgame';


    protected $fillable = ['idgame','idquestion','correcta'];
}
