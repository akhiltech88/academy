<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SessionTeam extends Model
{
    public function session(){
        return $this->hasOne('App\Session', 'id', 'session_id');
    }
}
