<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EventController extends Controller
{
    public function index(){
        return view('event-detail');
    }
    public function listEvent(){
        return view('event-list');
    }
    public function addEvent(){
        $user = User::where('email', Auth::user()->email)->first();
        return view('user/event-add')->with(compact('user'));
    }
    public function selectEvent(){
        return view('user/event-select');
    }
    public function editEvent(){

    }
    public function updateEvent(){

    }
    public function deleteEvent(){

    }
    public function undangan(){
        return view ('undangan');
    }
    public function joinedEvent(){
        return view ('user.event-join');
    }
    public function likedEvent(){
        return view ('user.event-like');
    }
    public function organizerList(){
        return view ('organizer');
    }
}
