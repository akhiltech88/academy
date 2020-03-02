<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Registration;
use Auth;

class SessionController extends Controller
{
    public function getSession(Request $request){
        $group = Group::get();
        $player = Registration::where('user_id',Auth::user()->id)->get();
        return view('sessionregistration')->withGroups($group)->withPlayers($player);
    }
}
