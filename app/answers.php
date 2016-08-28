<?php

namespace mormoton;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;
class answers extends Model
{

    protected $dates = ['deleted_at'];
    protected $table = 'answers';


    protected $fillable = ['id','answer'];
}
