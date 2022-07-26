<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        return view('event-detail');
    }
    public function listEvent(){
        return view('event-list');
    }
    public function makeEvent(){
        return view('');
    }
    public function storeEvent(){

    }
    public function editEvent(){

    }
    public function updateEvent(){

    }
    public function deleteEvent(){

    }
}
