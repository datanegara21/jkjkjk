<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB, Session, Redirect};
use App\Models\{User, Profile, Event, EventCategory, EventTemplate, Liked, Join, Notification};

class EventController extends Controller
{
    public function index($id){
        $event = Event::where('id', $id)->firstOrFail();
        $events = Event::where('profile_id', $event->profile->id)
                       ->where('start','<',now())
                       ->where('end','>',now())
                       ->limit(3)
                       ->get();

        if(Auth::check()){
            $snapToken = "";
            if($event->price != 0){
                $profile = Profile::where('email', Auth::user()->email)->first();

                // Set your Merchant Server Key
                \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
                // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                \Midtrans\Config::$isProduction = false;
                // Set sanitization on (default)
                \Midtrans\Config::$isSanitized = true;
                // Set 3DS transaction for credit card to true
                \Midtrans\Config::$is3ds = true;
                $params = array(
                    'transaction_details' => array(
                        'order_id' => rand(),
                        'gross_amount' => str_replace('.', '', $event->price),
                    ),"item_details" => array(
                        [
                        "id" => 'event'.$event->id,
                        "price" => str_replace('.','',$event->price),
                        "quantity" => 1,
                        "name" => 'Daftar "'.$event->title.'"'
                        ]
                    ),
                    'customer_details' => array(
                        'first_name' => Auth::user()->name ,
                        'last_name' => '',
                        'email' => Auth::user()->email,
                        'phone' => $profile->phone ? '0'.$profile->whatsapp : '',
                    ),
                );
                
                $snapToken = \Midtrans\Snap::getSnapToken($params);
            }
        }else{
            $snapToken = '';
        }

        $time = explode('-', $event->date);

        $joins = Join::where('event_id', $id)->paginate(10);

        return view('event-detail')->with(compact('events', 'event', 'time', 'joins', 'snapToken', 'id'));
    }
    public function listEvent(Request $request){
        if($request->search && $request->category) {
            $search = $request->search;
            $category = $request->category;

            $event_category = EventCategory::where('name', $category)->first();

            $events = Db::table('events')
                           ->join('event_templates', 'event_templates.id', '=', 'events.event_template_id')
                           ->where('start', '<', now())
                           ->where('end', '>', now())
                           ->where('event_templates.event_category_id', $event_category->id)
                           ->where('title', 'like', '%'.$search.'%')
                           ->paginate(9);
        }elseif($request->category) {
            $category = $request->category;

            $event_category = EventCategory::where('name', $category)->first();

            $events = DB::table('events')
                           ->join('event_templates', 'event_templates.id', '=', 'events.event_template_id')
                           ->where('events.start', '<', now())
                           ->where('events.end', '>', now())
                           ->where('event_templates.event_category_id', $event_category->id)
                           ->paginate(9);
        }elseif($request->search){
            $search = $request->search;

            $events = Event::where('end', '>', now())
                           ->where('start', '<', now())
                           ->where('title', 'like', '%'.$search.'%')
                           ->paginate(9);
        }else{
            $events = Event::where('start', '<', now())->where('end','>',now())->paginate(9);
        }

        $categories = EventCategory::all();
        
        return view('event-list')->with(compact('events', 'categories'));
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
            'image.max' => 'gambar tidak boleh lebih dari 3 MB',
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
            'image' => 'nullable|max:3072',
            'description' => 'required|min:8|max:1000',
            'date' => 'required',
            'location' => 'required|min:3|max:255',
            'map' => 'required',
            'total' => 'required|min:1|max:4',
            'price' => 'required|min:0',
            'start' => 'required|after:'.now(),
            'end' => 'required|after:start',
        ], $messages);

        
        
        $profile = Profile::where('email', Auth::user()->email)->first();

        $event = new Event;
            $event->profile_id = $profile->id;
            $event->event_template_id = $request->template;
            $event->title = $request->title;

            if($request->image) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->extension();
                $imageLoc = 'assets/media/template/image';
                $imageNames = $imageLoc.'/'.$imageName;
                $image->move(public_path($imageLoc),$imageName);
                $event->image = $imageNames;
            }

            $event->name = $request->name;
            $event->date = $request->date;
            $event->time = $request->time;
            $event->location = $request->location;
            $event->map = $request->map;
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
    public function editEvent($event_id){
        $event = Event::where('id', $event_id)->first();
        $profile = Profile::where('email', Auth::user()->email)->first();

        if(!$event) { return redirect('event')->withToastWarning('Event tidak ditemukan'); }
        if($event->profile_id != $profile->id){ return redirect('event')->withToastWarning('Anda tidak dapat mengakses halaman ini'); }

        return view('user.event-edit')->with(compact('event'));
    }
    public function updateEvent(Request $request, $event_id){
        $event = Event::where('id', $event_id)->first();
        $profile = Profile::where('email', Auth::user()->email)->first();

        if(!$event) { return redirect('event')->withToastWarning('Event tidak ditemukan'); }
        if($event->profile_id != $profile->id){ return redirect('event')->withToastWarning('Anda tidak dapat mengakses halaman ini'); }

        $messages = [
            'name.min' => 'nama tidak bisa kurang dari 3 karakter',
            'name.max' => 'nama tidak bisa lebih dari 255 karakter',
            'title.min' => 'nama event tidak bisa kurang dari 3 karakter',
            'title.max' => 'nama event tidak bisa lebih dari 255 karakter',
            'image.max' => 'gambar tidak boleh lebih dari 3 MB',
            'description.min' => 'description tidak bisa kurang dari 8 karakter',
            'description.max' => 'description tidak bisa lebih dari 1000 karakter',
            'location.min' => 'lokasi tidak bisa kurang dari 3 karakter',
            'location.max' => 'lokasi tidak bisa lebih dari 255 karakter',
            'total.min' => 'maks. pendaftar tidak bisa kurang dari 1',
            'total.max' => 'maks. pendaftar tidak bisa lebih dari 9999',
            'start.after' => 'waktu mulai harus lebih dari sekarang',
            'end.after' => 'waktu selesai harus lebih dari waktu mulai',
        ];
        $request->validate([
            'name' => 'required|min:3|max:255',
            'title' => 'required|min:5|max:255',
            'image' => 'nullable|max:3072',
            'description' => 'required|min:8|max:1000',
            'date' => 'required',
            'map' => 'nullable',
            'location' => 'required|min:3|max:255',
            'total' => 'required|min:1|max:4',
            'price' => 'required|min:0',
            'start' => 'required|after_or_equal:'.$event->start,
            'end' => 'required|after:start',
        ], $messages);

        $event = Event::where('id', $event_id)->first();
            $event->profile_id = $profile->id;
            $event->title = $request->title;

            if($request->image) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->extension();
                $imageLoc = 'assets/media/template/image';
                $imageNames = $imageLoc.'/'.$imageName;
                $image->move(public_path($imageLoc),$imageName);
                $event->image = $imageNames;
            }

            $event->name = $request->name;
            $event->date = $request->date;
            $event->time = $request->time;
            $event->location = $request->location;
            $event->map = $request->map;
            
            $event->description = $request->description;
            $event->total = $request->total;
            $event->price = $request->price;
            $event->start = $request->start;
            $event->end = $request->end;
        $event->save();


        return redirect('event/'.$event_id);
    }
    public function deleteEvent($event_id){
        $event = Event::where('id', $event_id)->first();
        $profile = Profile::where('email', Auth::user()->email)->first();

        if(!$event){return redirect('event')->withToastWarning('Event tidak ditemukan');}
        if($event->profile_id != $profile->id){ return redirect('event')->withToastWarning('Anda tidak dapat mengakses halaman ini'); }

        $event->delete();
        return redirect('event')->withToastSuccess('Event berhasil dihapus');
    }
    public function undangan(){
        return view ('undangan');
    }
    public function joinedEvent(Request $request){
        $profile = Profile::where('email', Auth::user()->email)->first();

        if($request->search && $request->category) {
            $search = $request->search;
            $category = $request->category;

            $event_category = EventCategory::where('name', $category)->first();

            $events = DB::table('joins')
                           ->join('events', 'joins.event_id', '=', 'events.id')
                           ->join('event_templates', 'event_templates.id', '=', 'events.event_template_id')
                           ->where('joins.profile_id', $profile->id)
                           ->where('event_templates.event_category_id', $event_category->id)
                           ->where('title', 'like', '%'.$search.'%')
                           ->paginate(9);

        }elseif($request->category) {
            $category = $request->category;

            $event_category = EventCategory::where('name', $category)->first();

            $events = DB::table('join')
                           ->join('events', 'joins.event_id', '=', 'events.id')
                           ->join('event_templates', 'event_templates.id', '=', 'events.event_template_id')
                           ->where('joins.profile_id', $profile->id)
                           ->where('event_templates.event_category_id', $event_category->id)
                           ->paginate(9);
        }elseif($request->search){
            $search = $request->search;

            $events = DB::table('join')
                           ->join('events', 'joins.event_id', '=', 'events.id')
                           ->where('joins.profile_id', $profile->id)
                           ->where('title', 'like', '%'.$search.'%')
                           ->paginate(9);
        }else{
            $events = Join::where('profile_id', $profile->id)
                           ->paginate(9);
        }
        
        $categories = EventCategory::all();

        return view ('user.event-join')->with(compact('events', 'categories'));
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
    public function likedEvent(Request $request){
        $profile = Profile::where('email', Auth::user()->email)->first();

        if($request->search && $request->category) {
            $search = $request->search;
            $category = $request->category;

            $event_category = EventCategory::where('name', $category)->first();

            $events = DB::table('likeds')
                           ->join('events', 'likeds.event_id', '=', 'events.id')
                           ->join('event_templates', 'event_templates.id', '=', 'events.event_template_id')
                           ->where('likeds.profile_id', $profile->id)
                           ->where('event_templates.event_category_id', $event_category->id)
                           ->where('title', 'like', '%'.$search.'%')
                           ->paginate(9);

        }elseif($request->category) {
            $category = $request->category;

            $event_category = EventCategory::where('name', $category)->first();

            $events = DB::table('likeds')
                           ->join('events', 'likeds.event_id', '=', 'events.id')
                           ->join('event_templates', 'event_templates.id', '=', 'events.event_template_id')
                           ->where('likeds.profile_id', $profile->id)
                           ->where('event_templates.event_category_id', $event_category->id)
                           ->paginate(9);
        }elseif($request->search){
            $search = $request->search;

            $events = DB::table('likeds')
                           ->join('events', 'likeds.event_id', '=', 'events.id')
                           ->where('likeds.profile_id', $profile->id)
                           ->where('title', 'like', '%'.$search.'%')
                           ->paginate(9);
        }else{
            $events = Liked::where('profile_id', $profile->id)
                           ->paginate(9);
        }
        
        $categories = EventCategory::all();

        return view ('user.event-like')->with(compact('events', 'categories'));
    }
    public function organizerList(Request $request){
        if($request) {
            $search = $request->search;

            $events = Event::groupBy('profile_id')
                             ->join('profiles', 'profiles.id', '=', 'events.profile_id')
                             ->where('profiles.name', 'like', '%'.$search.'%')
                             ->select('profile_id')
                             ->paginate(9);
        } else {
            $events = Event::groupBy('profile_id')
                             ->join('profiles', 'profiles.id', '=', 'events.profile_id')
                             ->select('profile_id')
                             ->paginate(9);
        }

        return view ('organizer')->with(compact('events'));
    }
    public static function checkLiked($event_id) {
        if(Auth::check() && Auth::user()->role == 1){
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
    public function toImage($id){
        $event = Event::where('id', $id)->first();

        header('Content-type: image/png');

        $explodeExt = last(explode('.', $event->event_template->template));
        // dd($explodeExt);
        if($explodeExt == 'png'){
            $template = imagecreatefrompng(public_path($event->event_template->template));
            $template_width = imagesx($template);
            $template_height = imagesy($template);
        }else{
            $template = imagecreatefromjpeg(public_path($event->event_template->template));
            $template_width = imagesx($template);
            $template_height = imagesy($template);
        }


        //warna
        $black = imagecolorallocate($template, 0,0,0);

        $user = $event->profile->name;


        imagepng($template);
        imagedestroy($template);        

    }
    public static function checkMaker($event_id) {
        if(Auth::check() && Auth::user()->role == 1) {
            $profile = Profile::where('email', Auth::user()->email)->first();

            $maker = Event::where('id', $event_id)
                          ->where('profile_id', $profile->id)
                          ->first();

            if($maker) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public static function isJoined($event_id) {
        if(Auth::check()){
            $profile = Profile::where('email', Auth::user()->email)->first();

            $joined = Join::where('profile_id', $profile->id)
                ->where('event_id', $event_id)
                ->first();
            
            if($joined) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public static function isPaid($event_id) {
        if(Auth::check()){
            $profile = Profile::where('email', Auth::user()->email)->first();

            $joined = Join::where('profile_id', $profile->id)
                ->where('event_id', $event_id)
                ->where('paid', 1)
                ->first();
            
            if($joined) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function joinEvent(Request $request, $event_id) {

        $event = Event::where('id', $event_id)->first();
        $join = Join::where('event_id', $event_id)->count();

        if(!Auth::check()) {
            return redirect('login')->withToastWarning('Silahkan login terlebih dahulu sebelum mendaftar event');
        }

        if($event->total <= $join){
            return redirect('event/'.$event_id)->withToastWarning('Batas pendaftar event telah lebih dari batas maksimum');
        }

        if($event->price == 0) {
            $profile = Profile::where('email', Auth::user()->email)->first();
            $joined = Join::where('profile_id', Auth::user()->id)->where('event_id', $event_id)->first();

            if($joined) {
                return redirect()->back()->withToastWarning('Akun anda telah mendaftar pada event ini');  
            }
            Join::create([
                'profile_id' => $profile->id,
                'event_id' => $event_id,
                'email' => Auth::user()->email,
                'paid' => 1,
            ]);
            Notification::create([
                'profile_from' => $profile->id,
                'profile_to' => $event->profile->id,
                'message' => 'seseorang mendaftar ke event yang anda buat',
                'link' => 'event/'.$event->id.'/'.Auth::user()->email,
                'icon' => 'flaticon2-calendar text-primary',
            ]);
            return redirect('event/'.$event_id)->withToastSuccess('Anda telah berhasil daftar pada '.$event->title);
            
        } else {
            return redirect('event/'.$event_id)->withToastWarning('Fitur event berbayar sedang dalam pengembangan');
        }
    }
    public function viewInvitation($id, $email) {
        $join = Join::where('event_id', $id)
                    ->first();
        $event = Event::where('id', $id)->first();

        return view('invite')->with(compact('event', 'join'));
    }
}
