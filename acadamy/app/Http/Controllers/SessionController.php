<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use App\Registration;
use App\SessionPlayer;
use App\Team;
use App\SessionTeam;
use Validator;
use Auth;

class SessionController extends Controller
{
    public function getSession(Request $request){
        // $group = Group::get();
        // return view('sessionregistration')->withGroups($group);
        $session = Session::whereType(0)->get();
        $session_team = Session::whereType(1)->get();
        $teams = Team::where('user_id',Auth::user()->id)->get();
        $player = Registration::where('user_id',Auth::user()->id)->get();
        return view('sessionregistration')
        ->withSessions($session)->withPlayers($player)
        ->withTeams($teams)->withSessionteam($session_team);
    }
    public function getSessionById($id){
        $reg = Registration::find($id);
        $session = Session::where('session_type',$reg->type)->orWhere('session_type',0)->get();
        return $session;
    }
    public function saveSession(Request $request){
        $validator = Validator::make($request->all(), [ 
            'player' => 'required',
            'session' => 'required'
		]);
		if ($validator->fails()) { 
			return redirect("session")->withSuccess('Validation Failed');          
        }
        $session = new SessionPlayer();
        $session->child_id = $request->player;
        $session->session_id = $request->session;
        $session->user_id = Auth::user()->id;
        $session->start_date =date("Y-m-d");
        $session->end_date =date("Y-m-d");
        $session->status = 0;
        $session->save();
        return redirect("player")->withSuccess('Player Added Successfully');
    }
    public function saveTeamSession(Request $request){
        $validator = Validator::make($request->all(), [ 
            'team' => 'required',
            'session_team' => 'required'
		]);
		if ($validator->fails()) { 
			return redirect("session")->withSuccess('Validation Failed');          
        }
        $session = new SessionTeam();
        $session->team_id = $request->team;
        $session->session_id = $request->session_team;
        $session->user_id = Auth::user()->id;
        $session->start_date =date("Y-m-d");
        $session->end_date =date("Y-m-d");
        $session->status = 0;
        $session->save();
        return redirect("team")->withSuccess('Team Added Successfully');
    }
}
