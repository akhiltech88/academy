<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use Auth;
use Validator;
use Response;

class RegistrationController extends Controller
{
    public function createPlayer(Request $request){
        $validator = Validator::make($request->all(), [ 
            'title' => 'required',
            'child_surname' => 'required',
            'child_dob' => 'required', 
            'child_name' => 'required',
            'child_idnumber' => 'required',
            'medical' => 'required',
            'parent_title' => 'required',
            'parent_surname' => 'required',
            'postal' => 'required',
            'postal_code' => 'required',
            'email' => 'required|email',
            'parent_cell' => 'required',
            'parent_fax' => 'required',
            'parent_name' => 'required',
            'employer' => 'required'
		]);
		if ($validator->fails()) { 
			return View('registration');           
        }
        $dateOfBirth = date("Y-m-d",strtotime($request->child_dob));;
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        $age = $diff->format('%y');
        $ses = $this->getSession($age);
        if($ses!=6){
        $reg = new Registration();
        $reg->child_title = $request->title;
        $reg->child_surname = $request->child_surname;
        $reg->child_givenname = $request->child_name;
        $reg->child_idno = $request->child_idnumber;
        $reg->dob = date("Y-m-d",strtotime($request->child_dob));
        $reg->medical = $request->medical;
        $reg->parent_title = $request->parent_title;
        $reg->parent_surname = $request->parent_surname;
        $reg->parent_givenname = $request->parent_name;
        $reg->parent_idno = $request->parent_idnumber;
        $reg->postal_addr = $request->postal;
        $reg->home_addr = $request->home;
        $reg->postal_code = $request->postal_code;
        $reg->home_code = $request->home_code;
        $reg->parent_email = $request->email;
        $reg->parent_cell = $request->parent_cell;
        $reg->parent_fax = $request->parent_fax;
        $reg->parent_telh = $request->parent_telh;
        $reg->parent_telw = $request->parent_telw;
        $reg->employer = $request->employer;
        $reg->other_name = $request->other_contact;
        $reg->other_cell = $request->other_cell;
        $reg->other_telh = $request->other_telh;
        $reg->other_telw = $request->other_telw;
        $reg->user_id = Auth::user()->id;
        $reg->type = $ses;
        $reg->save();
        return redirect("session")->withSuccess('Player Added Successfully');
        }else{
            return View('registration')->withSuccess('Invalid Age');
        }
    }
    public function getSession($age){
        if($age<=9){
            return 1;
        }
        if($age>9 && $age<=11){
            return 2;
        }
        if($age>11 && $age<=13){
            return 3;
        }
        if($age>11 && $age<=16){
            return 4;
        }
        if($age>16 && $age<=19){
            return 5;
        }else{
            return 6;
        }
    }
    public function playerList(Request $request){
        if(Auth::user()->client_admin == 0)
        $player = Registration::with('player_session.session')->where('user_id',Auth::user()->id)->paginate(10);
        else
        $player = Registration::with('player_session.session')->paginate(10);
        return view('playerlist')->withPlayers($player);
    }
}
