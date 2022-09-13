<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB};
use App\Models\{User, Profile, Event, EventCategory, EventTemplate, Liked};

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
        $events = Event::where('end','>',now())->paginate(9);
        return view('event-list')->with(compact('events'));
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
    public function likeEvent($event_id) {
        $profile = Profile::where('email', Auth::user()->email)->first();

        //check liked event
        $liked = Liked::where('event_id', $event_id)
                      ->where('profile_id', $profile->id)
                      ->first();

        if($liked){
            $liked->delete();

            return redirect()->back()->withToastSuccess('Event berhasil dihapus dari daftar disukai');
        }else{
            Liked::create([
                'event_id' => $event_id,
                'profile_id' => $profile->id
            ]);
            
            return redirect()->back()->withToastSuccess('Event berhasil disukai');
        }
    }
    public function likedEvent(){
        $profile = Profile::where('email', Auth::user()->email)->first();
        $events = Liked::where('profile_id', $profile->id)->get();

        return view ('user.event-like')->with(compact('events'));
    }
    public function organizerList(){
        $events = Event::select('events.profile_id')->groupBy('profile_id')->paginate(9);

        return view ('organizer')->with(compact('events'));
    }
    public static function checkLiked($event_id) {
        if(Auth::check()){
            $profile = Profile::where('email', Auth::user()->email)->first();

            $liked = Liked::where('profile_id', $profile->id)
                        ->where('event_id', $event_id)
                        ->first();

            if($liked) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
