<?php

namespace mormoton;

use Illuminate\Database\Eloquent\Model;
use mormoton\answers;
use SoftDeletes;
class question extends Model
{

    protected $dates = ['deleted_at'];
    protected $table = 'question';


    protected $fillable = ['id','idbook','question','user_id'];

    public function scopeByUser($query, $user_id){
        $query->where('user_id', $user_id);
    }

    public function getRespuestacorrectaAttribute(){
        $respuesta= answers::where('idquestion',$this->id)->where('correcta','1')->first();
//dd($respuesta->answer);
        return $respuesta->answer;
    }
    public function userdata(){
        return $this->hasOne('mormoton\User', 'id', 'user_id');
    }
    public function libro(){
        return $this->hasOne('mormoton\books', 'id', 'idbook');
    }
}
