<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB};
use App\Models\{Event, Notification};

class EventController extends Controller
{
    public function index() {
        $events = Event::count();
        return view('admin.event-list')->with(compact('events'));
    }
    public function data_event() {
        $events = DB::table('events')
                    ->join('profiles', 'events.profile_id' , '=', 'profiles.id')
                    ->join('event_templates', 'events.event_template_id' , '=', 'event_templates.id')
                    ->join('event_categories', 'event_templates.event_category_id' , '=', 'event_categories.id')
                    ->orderBy('events.id', 'desc')
                    ->select('events.id', 'events.title', 'profiles.name', 'profiles.email', 'events.description', 'events.created_at')
                    ->get();

        return response()->json([
            'data' => $events
        ]);
    }
    public function delete_event(Request $request, $id_event) {
        $message = [
            'reason.min' => 'Alasan harus lebih dari 5 karakter',
            'reason.max' => 'Alasan harus kurang dari 255 karakter',
        ];
        
        $validator = [
            'reason' => 'bail|required|min:5|max:255'
        ];
        
        $request->validate($validator, $message);

        $event = Event::where('id', $id_event)->first();
        Notification::create([
            'profile_from' => 1,
            'profile_to' => $event->profile->id,
            'message' => 'Event anda telah dihapus karna '.$request->reason,
            'link' => 'profile',
            'icon' => 'flaticon2-calendar text-danger',
        ]);
        $event->delete();
        return redirect('admin/event')->withToastSuccess('Event berhasil dihapus');
    }
}
