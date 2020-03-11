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
            'idnumber' => 'required',
            'id_copy' => 'required|file',
            'total_players' => 'required'
		]);
		if ($validator->fails()) { 
			return View('teamregistration');           
        }
        $team = new Team();
        $team->name = $request->team_name;
        $team->contact = $request->contact_person;
        $team->email = $request->email;
        $team->mobile = $request->mobile;
        $team->total_players = $request->total_players;
        $team->id_number = $request->idnumber;
        $team->user_id = Auth::user()->id;
        if ($request->hasFile('id_copy')) {
            $name = "id".time();
            $extension = $request->id_copy->extension();
            $request->file('id_copy')->move(public_path().'/team/id',$name.".".$extension);
            $team->id_copy = "team/id/".$name.".".$extension;
        }
        $team->save();
        return View('teamregistration');
    }
    public function teamList(Request $request){
        if(Auth::user()->client_admin == 0)
        $teams = Team::with('team_session.session')->where('user_id',Auth::user()->id)->paginate(10);
        else
        $teams = Team::with('team_session.session')->paginate(10);
        return view('teamlist')->withTeams($teams);
    }
}
