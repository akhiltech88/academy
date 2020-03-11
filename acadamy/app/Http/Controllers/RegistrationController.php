<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use App\SessionPlayer;
use App\User;
use App\Country;
use Auth;
use Validator;
use Response;

class RegistrationController extends Controller
{
    private $headers;
    function __construct(){
        $this->headers = [
                    'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
                ,   'Content-type'        => 'text/csv'
                ,   'Content-Disposition' => 'attachment; filename=report.csv'
                ,   'Expires'             => '0'
                ,   'Pragma'              => 'public'
            ];
    }
    
    public function getRegistration(){
        $countries = Country::get();
        return view('registration')->withCountries($countries);
    }
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
            'nationality' => 'required',
            'postal' => 'required',
            'postal_code' => 'required',
            'email' => 'required|email',
            'parent_cell' => 'required',
            'parent_name' => 'required',
            'id_copy' => 'required|file',
            'parentid_copy' => 'required|file',
            'employer' => 'required'
		]);
		if ($validator->fails()) { 
			return back()->withInput()->withErrors($validator);           
        }
        $dateOfBirth = date("Y-m-d",strtotime($request->child_dob));
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        $age = $diff->format('%y');
        $ses = $this->getSession($age);
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
        if ($request->hasFile('id_copy')) {
            $name = "id".time();
            $extension = $request->id_copy->extension();
            $request->file('id_copy')->move(public_path().'/player/id',$name.".".$extension);
            $reg->player_idcopy = "player/id/".$name.".".$extension;
        }
        if ($request->hasFile('parentid_copy')) {
            $name = "id".time();
            $extension = $request->parentid_copy->extension();
            $request->file('parentid_copy')->move(public_path().'/player/id',$name.".".$extension);
            $reg->parent_idcopy = "player/id/".$name.".".$extension;
        }
        $reg->nation_id = $request->nationality;
        $reg->save();
        return redirect("session")->withSuccess('Player registered successfully');
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
            return 5;
        }
    }
    public function playerList_old(Request $request){
        $filters = [];
        $player = new Registration();
        if(Auth::user()->client_admin == 0)
        $player = $player->with('player_session.session')->where('user_id',Auth::user()->id);
        else
        $player = $player->with('player_session.session');

        if($request->has('status')){
            $filters['status'] = $request->status;
            $player = $player->whereHas('player_session', function ($query) use ($request) {
                $query->where('status', $request->status);
            });
        }
        if($request->date_range){
            $filters['dates'] = $request->date_range;
            $dates = explode("-", $request->date_range);
            $from = date("Y-m-d",strtotime($dates[0]));
            $to = date("Y-m-d",strtotime($dates[1]));
            $player = $player->whereHas('player_session', function ($query) use ($from,$to) {
                $query->whereBetween('end_date', array($from, $to));
            });
        }
        $player = $player->paginate(1)->appends('status',request('status'))->appends('date_range',request('date_range'));
        return view('playerlist',compact('playerlist'))->withPlayers($player)->withFilters($filters);
    }
    public function playerList(Request $request){
        $filters = [];
        $player = new SessionPlayer();
        $countries = Country::get();
        if(Auth::user()->client_admin == 0)
        $player = $player->with('session','player.country')->where('user_id',Auth::user()->id);
        else
        $player = $player->with('session','player.country');

        if($request->has('status')){
            $filters['status'] = $request->status;
            $player = $player->where('status', $request->status);
        }
        if($request->date_range){
            $filters['dates'] = $request->date_range;
            $dates = explode("-", $request->date_range);
            $from = date("Y-m-d",strtotime($dates[0]));
            $to = date("Y-m-d",strtotime($dates[1]));
            $player = $player->whereBetween('end_date', array($from, $to));
        }
        if($request->country){
            $cnt = Country::where('nationality_id',$request->country)->first();
            $filters['country'] = $cnt->nationality_name;
            $player = $player->whereHas('player', function ($query) use ($request) {
                $query->where('nation_id', $request->country);
            });
        }
        if($request->has('excel')){
            $player = $player->get();
            $columns = Array('Child Surname','Child Given Name','Child Id Number','Child dob','Nationality',
        'Parent Surname','Parent Given Name','Parent Id Number','Postal Code','Email','Cell','Postal Address','Home Address','Session','Start Date','End Date','Status');
            $callback = $this->reportExcel($player,$columns);
            return Response::stream($callback, 200, $this->headers);
        }
        $player = $player->paginate(10)->appends('status',request('status'))->appends('date_range',request('date_range'));
        return view('playerlist')->withPlayers($player)->withCountries($countries)->withFilters($filters);
    }
    public function playerListByUser($user_id){
        $user = User::find($user_id); 
        $player = Registration::with('player_session.session')->where('user_id',$user_id)->paginate(10);
        return view('userdetails')->withPlayers($player)->withUser($user);
    }
    public function playerProfile($player_id){
        if(Auth::user()->client_admin == 1)
        $player = Registration::with('player_session.session')->find($player_id);
        else
        $player = Registration::with('player_session.session')->where('user_id',Auth::user()->id)->find($player_id);
        
        if($player)
        return view('playerdetails')->withPlayers($player);
        else
        return redirect("playerlist");

    }
    public function reportExcel($list,$columns){    
        $callback = function() use ($list,$columns) 
         {
             $FH = fopen('php://output', 'w');
             fputcsv($FH, $columns);
             foreach ($list as $row) {
                 $data = array($row['player']['child_surname'],$row['player']['child_givenname'],$row['player']['child_idno'],
                 $row['player']['dob'],$row['player']['country']['nationality_name'],$row['player']['parent_surname'],
                 $row['player']['parent_givenname'],$row['player']['parent_idno'],$row['player']['postal_code'],$row['player']['parent_email'],
                 $row['player']['parent_cell'],$row['player']['postal_addr'],$row['player']['home_addr'],$row['session']['name'],
                 $row['start_date'],$row['end_date'],($row['status'] == 1)?"Approved":"Un Approved");
                 fputcsv($FH, $data);
             }
             fclose($FH);
         };
         return $callback;
     }
     public function deletePlayer($id){
        $session_player = SessionPlayer::find($id);
        $count = SessionPlayer::where('child_id',$session_player->child_id)->count();
        if($count==1){
            Registration::find($session_player->child_id)->delete();
            $session_player->delete();
        }else{
            $session_player->delete(); 
        }
        return redirect("playerlist")->withSuccess('Player deleted successfully');
     } 
}
