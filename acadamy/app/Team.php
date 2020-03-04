<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function team_session(){
        return $this->hasOne('App\SessionTeam', 'team_id', 'id');
    }
}
