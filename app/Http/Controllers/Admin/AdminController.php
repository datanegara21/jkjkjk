<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB};
use Carbon\Carbon;
use App\Models\{User, Profile, EventTemplate, EventCategory, Event};
use Hamcrest\Core\AllOf;

class AdminController extends Controller
{
    public function index(){
        $dataUser = User::where('role',1)->get();
        $dataEvent = Event::all();
        $user = Profile::count();
        $penggunas = Profile::limit(5)->get();
        $event = Event::count();
        $acaras = Event::limit(5)->get();
        $category = EventCategory::count();
        $template = EventTemplate::count();

        $chartUser = User::where('role',1)->select(DB::raw("COUNT(*) as chartUser"), DB::raw("Month(created_at) as monthUser"))
                    ->whereYear('created_at', date('Y'))
                    ->orderBy('monthUser','asc')
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('chartUser');

        $chartEvent = Event::select(DB::raw("COUNT(*) as chartEvent"), DB::raw("Month(created_at) as monthEvent"))
                    ->whereYear('created_at', date('Y'))
                    ->orderBy('monthEvent','asc')
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('chartEvent');

        $monthUser = User::select(DB::raw("MONTHNAME(created_at) as monthUser"))
                ->groupBy(DB::raw("MONTHNAME(created_at)"))
                ->pluck('monthUser');
                
        $monthEvent = Event::select(DB::raw("MONTHNAME(created_at) as monthEvent"))
                ->groupBy(DB::raw("MONTHNAME(created_at)"))
                ->pluck('monthEvent');
                
        $chartUser = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $chartEvent = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        foreach($dataUser as $d){
            $data = $chartUser[Carbon::parse($d->created_at)->month-1];
            $chartUser[Carbon::parse($d->created_at)->month-1]=$data+1;
        }
        foreach($dataEvent as $d){
            $data = $chartEvent[Carbon::parse($d->created_at)->month-1];
            $chartEvent[Carbon::parse($d->created_at)->month-1]=$data+1;
        }

        return view('admin.index')->with(compact('penggunas', 'user', 'acaras', 'event', 'category', 'template', 'chartUser', 'monthUser', 'chartEvent', 'monthEvent'));
    }
}
