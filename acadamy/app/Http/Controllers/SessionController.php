<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use Auth;

class SessionController extends Controller
{
    public function getSession(Request $request){
        $group = Group::get();
        return view('sessionregistration')->withGroups($group);
    }
}
