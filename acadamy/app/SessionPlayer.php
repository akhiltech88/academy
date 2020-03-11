<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class SessionPlayer extends Model
{
    use SoftDeletes;
    public function session(){
        return $this->hasOne('App\Session', 'id', 'session_id');
    }
    public function player(){
        return $this->hasOne('App\Registration', 'id', 'child_id');
    }
}
