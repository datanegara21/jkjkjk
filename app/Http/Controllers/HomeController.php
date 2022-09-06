<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Event, Profile};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::where('end','>',now())->limit(6)->get();
        $penggunas = Profile::limit(3)->get();

        return view('index')->with(compact('events', 'penggunas'));
    }
}
