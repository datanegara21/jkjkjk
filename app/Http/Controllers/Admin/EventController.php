<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB};
use App\Models\{Event};

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
    public function delete_event($id_event) {
        Event::where('id', $id_event)->delete();
        return redirect('admin/event');
    }
}
