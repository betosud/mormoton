<?php

namespace mormoton;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;
class question extends Model
{

    protected $dates = ['deleted_at'];
    protected $table = 'question';


    protected $fillable = ['id','idbook','question','idrespuesta','user_id'];

    public function scopeByUser($query, $user_id){
        $query->where('user_id', $user_id);
    }

    public function respuesta(){
        return $this->hasOne('mormoton\answers', 'id', 'idrespuesta');
    }
    public function userdata(){
        return $this->hasOne('mormoton\User', 'id', 'user_id');
    }
    public function libro(){
        return $this->hasOne('mormoton\books', 'id', 'idbook');
    }
}
