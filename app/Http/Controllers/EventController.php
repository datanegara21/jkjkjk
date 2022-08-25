<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User, Profile, Event, EventCategory, EventTemplate};

class EventController extends Controller
{
    public function index(){
        return view('event-detail');
    }
    public function listEvent(){
        return view('event-list');
    }
    public function addEvent(){
        if(session()->get('tipe') == null || session()->get('template') == null){
            return redirect('event/select')->withToastWarning('Pilih template terlebih dahulu');
        }

        $user = User::where('email', Auth::user()->email)->first();
        return view('user/event-add')->with(compact('user'));
    }
    public function storeEvent(Request $request){
        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            'map' => 'nullable',
            'total' => 'required',
            'price' => 'required',
            'start' => 'nullable',
            'end' => 'required',
        ]);

        $profile = Profile::where('email', Auth::user()->email)->first();

        $event = new Event;
            $event->profile_id = $profile->id;
            $event->event_template_id = $request->template;
            $event->title = $request->title;
            $event->name = $request->name;
            $event->date = $request->date;
            $event->time = $request->time;
            $event->location = $request->location;
            $event->description = $request->description;
            $event->total = $request->total;
            $event->price = $request->price;
            $event->start = $request->start;
            $event->end = $request->end;
        $event->save();

        return redirect('profile')->withToastSuccess('Event telah berhasil dibuat');
    }
    public function requestEvent(Request $request){
        
        $message = [
            'tipe.required' => 'Kategori belum dipilih',
            'template.required' => 'Template belum dipilih'
        ];

        $request->validate([
            'tipe' => 'required',
            'template' => 'required'
        ], $message);

        $tipe = $request->tipe;
        $template = $request->template;
        
        return redirect('event/add')->with(compact('tipe', 'template'));
    }
    public function selectEvent(){
        $categories = EventCategory::all();
        
        return view('user/event-select')->with(compact('categories'));
    }public function varTemplate(Request $request){
        $tipe = $request['tipe'];
        $template = EventTemplate::where('event_category_id', $tipe)->get();
        $totalTemplate = $template->count();

        $keyResult = ['template' => $template, 'total' => $totalTemplate];
        
        return $keyResult;
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
