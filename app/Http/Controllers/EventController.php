<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth};
use App\Models\{User, Profile, Event, EventCategory, EventTemplate};

class EventController extends Controller
{
    public function index($id){
        $event = Event::where('id', $id)->firstOrFail();
        $events = Event::where('profile_id', $event->profile->id)
                       ->where('end','>',now())
                       ->limit(3)
                       ->get();

        $time = explode('-', $event->date);

        return view('event-detail')->with(compact('events', 'event', 'time'));
    }
    public function listEvent(){
        return view('event-list');
    }
    public function selectEvent(){
        $categories = EventCategory::all();
        
        return view('user/event-select')->with(compact('categories'));
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

        session([
            'tipe' => $request->tipe,
            'template' => $request->template
        ]);
        
        return redirect('event/add');
    }
    public function addEvent(){
        if(session()->get('tipe') == null || session()->get('template') == null){
            return redirect('event/select')->withToastWarning('Pilih template terlebih dahulu');
        }

        $user = User::where('email', Auth::user()->email)->first();
        return view('user/event-add')->with(compact('user'));
    }
    public function storeEvent(Request $request){
        
        $messages = [
            'name.min' => 'nama tidak bisa kurang dari 3 karakter',
            'name.max' => 'nama tidak bisa lebih dari 255 karakter',
            'title.min' => 'nama event tidak bisa kurang dari 3 karakter',
            'title.max' => 'nama event tidak bisa lebih dari 255 karakter',
            'description.min' => 'description tidak bisa kurang dari 8 karakter',
            'description.max' => 'description tidak bisa lebih dari 1000 karakter',
            'location.min' => 'lokasi tidak bisa kurang dari 3 karakter',
            'location.max' => 'lokasi tidak bisa lebih dari 255 karakter',
            'map.required' => 'map belum dipilih',
            'total.min' => 'maks. pendaftar tidak bisa kurang dari 1',
            'total.max' => 'maks. pendaftar tidak bisa lebih dari 9999',
            'start.after' => 'waktu mulai harus lebih dari sekarang',
            'end.after' => 'waktu selesai harus lebih dari waktu mulai',
        ];
        $request->validate([
            'name' => 'required|min:3|max:255',
            'title' => 'required|min:5|max:255',
            'description' => 'required|min:8|max:1000',
            'date' => 'required',
            'location' => 'required|min:3|max:255',
            'map' => 'required',
            'total' => 'required|min:1|max:4',
            'price' => 'nullable|min:0',
            'start' => 'nullable|after:'.now(),
            'end' => 'required|after:start',
        ], $messages);

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

        session()->forget('tipe', 'template');

        return redirect('profile')->withToastSuccess('Event telah berhasil dibuat');
    }
    public function varTemplate(Request $request){
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
