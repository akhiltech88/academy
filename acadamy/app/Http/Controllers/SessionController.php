<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use App\Registration;
use App\SessionPlayer;
use Validator;
use Auth;

class SessionController extends Controller
{
    public function getSession(Request $request){
        // $group = Group::get();
        // return view('sessionregistration')->withGroups($group);
        $session = Session::get();
        $player = Registration::where('user_id',Auth::user()->id)->get();
        return view('sessionregistration')->withSessions($session)->withPlayers($player);
    }
    public function getSessionById($id){
        $reg = Registration::find($id);
        $session = Session::where('type',$reg->type)->get();
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
        $session->save();
        return redirect("session")->withSuccess('Player Added Successfully');
    }
}
