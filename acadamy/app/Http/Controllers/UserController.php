<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use Response;

class UserController extends Controller
{
    public function register(Request $request){
		$validator = Validator::make($request->all(), [ 
			'name' => 'required', 
			'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL', 
			'password' => 'required', 
			'c_password' => 'required|same:password', 
		]);
		if ($validator->fails()) { 
			return View('signup');           
		}
		$user = new User();
		$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
		$user->save();
		if($user){
			if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
				return View('home');
			}
		} 
		else{ 
			return View('signup');
		}		
	}
	public function login(Request $request){
		if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
			$user = Auth::user(); 
			$data = array(
					'name' => Auth::user()->name,
					'id' => Auth::user()->id,
					'client_admin'  => (Auth::user()->client_admin == 1)? 'true':'false'
					);
			return redirect('/home');
		} 
		else{ 
			return redirect()->back()->withErrors('Invalid Email or Password');
		//	return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');		
		}			 
	}
	public function changePassword(Request $request,$id){
		$validator = Validator::make($request->all(), [ 
			'password' => 'required', 
			'confirm_password' => 'required|same:password', 
		]);
		if ($validator->fails()) { 
			return back()->withInput()->withErrors($validator);           
		}
		$input = $request->all(); 
		$user = User::find($id)->update(['password' => bcrypt($input['password'])]); 
		if($user){
			return redirect()->back()->with('message', 'Password Updated');
		}else{
			return redirect()->back()->with('err_message', 'Failed to password updated');
		}
	}
	public function logout(Request $request) {
	  Auth::logout();
	  return redirect('/login');
	}
	
}
