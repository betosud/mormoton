<?php

namespace mormoton;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class game extends Model
{
    protected $table = 'games';
    protected $dates = ['deleted_at'];

    protected $fillable = ['id','iduser','typelevel','timestart','endtime','score','token'];

}
