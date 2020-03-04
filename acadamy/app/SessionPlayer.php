<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SessionPlayer extends Model
{
    public function session(){
        return $this->hasOne('App\Session', 'id', 'session_id');
    }
}
