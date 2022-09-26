<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Event, EventCategory, Profile};

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
    public function index(Request $request) {
        $events = Event::where('start', '<', now())->where('end','>',now())->limit(6)->get();
        $penggunas = Profile::limit(3)->get();
        $categories = EventCategory::all();

        return view('index')->with(compact('events', 'penggunas', 'categories'));
    }
}
