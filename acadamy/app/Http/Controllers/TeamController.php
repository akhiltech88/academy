<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use Auth;
use Validator;
use Response;

class TeamController extends Controller
{
    public function createTeam(Request $request){
        $validator = Validator::make($request->all(), [ 
            'team_name' => 'required',
            'contact_person' => 'required',
            'email' => 'required', 
            'mobile' => 'required',
            'total_players' => 'required'
		]);
		if ($validator->fails()) { 
			return View('team');           
        }
        $team = new Team();
        $team->team_name = $request->team_name;
        $team->contact_person = $request->contact_person;
        $team->email = $request->email;
        $team->mobile = $request->mobile;
        $team->total_players = $request->total_players;
        $team->user_id = Auth::user()->id;
        $team->save();
    }
}