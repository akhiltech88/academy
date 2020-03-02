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
            'home' => 'required',
            'home_code' => 'required',
            'parent_telh' => 'required',
            'parent_telw' => 'required',
            'employer' => 'required',
            'other_contact' => 'required',
            'other_telh' => 'required',
            'other_cell' => 'required',
            'other_telw' => 'required'
		]);
		if ($validator->fails()) { 
			return View('registration');           
        }
        $from = new DateTime($request->child_dob);
        $to   = new DateTime('today');
        $age = $from->diff($to)->y;
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
        $reg->save();
    }
    public function getSession($age){
        if($age<=9){
            return 1;
        }
        if($age>9 && $age<=11){
            return 2;
        }
    }
}
