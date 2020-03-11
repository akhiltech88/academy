<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use SoftDeletes;
    public function player_session(){
        return $this->hasOne('App\SessionPlayer', 'child_id', 'id');
    }
    public function country(){
        return $this->hasOne('App\Country', 'nationality_id', 'nation_id');
    }
}
