<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    public function player_session(){
        return $this->hasOne('App\SessionPlayer', 'child_id', 'id');
    }
}
