<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB};
use Carbon\Carbon;
use App\Models\{User, Profile, EventTemplate, EventCategory, Event, Payment};
use Hamcrest\Core\AllOf;

class AdminController extends Controller
{
    public function index(){
        $dataUser = User::where('role',1)->get();
        $dataEvent = Event::all();
        $dataPay = Payment::where('status', 'settlement')->orwhere('status', 'capture')->get();
        $dataPending = Payment::where('status', 'pending')->get();
        $dataFail = Payment::where('status', 'deny')->orwhere('status', 'cancel')->orwhere('status', 'expired')->get();
        $user = Profile::where('email','!=','admin@get.id')->orderBy('created_at', 'desc')->count();
        $penggunas = Profile::where('email','!=','admin@get.id')->limit(5)->get();
        $event = Event::count();
        $acaras = Event::orderBy('created_at', 'desc')->limit(5)->get();
        $category = EventCategory::count();
        $template = EventTemplate::count();
        $totalPay = Payment::where('status', 'settlement')
                              ->orwhere('status', 'capture')
                              ->sum('gross_amount');

        // $chartUser = User::where('role',1)->select(DB::raw("COUNT(*) as chartUser"), DB::raw("Month(created_at) as monthUser"))
        //             ->whereYear('created_at', date('Y'))
        //             ->orderBy('monthUser','asc')
        //             ->groupBy(DB::raw("Month(created_at)"))
        //             ->pluck('chartUser');

        // $chartEvent = Event::select(DB::raw("COUNT(*) as chartEvent"), DB::raw("Month(created_at) as monthEvent"))
        //             ->whereYear('created_at', date('Y'))
        //             ->orderBy('monthEvent','asc')
        //             ->groupBy(DB::raw("Month(created_at)"))
        //             ->pluck('chartEvent');
        
        // $chartDone = Event::select(DB::raw("COUNT(*) as chartDone"), DB::raw("Month(end) as monthDone"))
        //             ->whereYear('end', date('Y'))
        //             ->orderBy('monthDone', 'asc')
        //             ->groupBy(DB::raw("Month(end)"))
        //             ->pluck('chartDone');

        $monthUser = User::select(DB::raw("MONTHNAME(created_at) as monthUser"))
                ->groupBy(DB::raw("MONTHNAME(created_at)"))
                ->pluck('monthUser');
                
        $monthEvent = Event::select(DB::raw("MONTHNAME(created_at) as monthEvent"))
                ->groupBy(DB::raw("MONTHNAME(created_at)"))
                ->pluck('monthEvent');

        $monthDone = Event::select(DB::raw("MONTHNAME(end) as monthDone"))
                    ->groupBy(DB::raw("MONTHNAME(end)"))
                    ->pluck('monthDone');
        $monthPay = Payment::select(DB::raw("MONTHNAME(created_at) as monthPay"))
                    ->groupBy(DB::raw("MONTHNAME(created_at)"))
                    ->pluck('monthPay');
                
        $chartUser = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $chartEvent = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $chartDone = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $chartPay = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $chartPending = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $chartFail = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        foreach($dataUser as $d){
            $data = $chartUser[Carbon::parse($d->created_at)->month-1];
            $chartUser[Carbon::parse($d->created_at)->month-1]=$data+1;
        }
        foreach($dataEvent as $d){
            $data = $chartEvent[Carbon::parse($d->created_at)->month-1];
            $chartEvent[Carbon::parse($d->created_at)->month-1]=$data+1;
        }
        foreach($dataEvent as $d){
            $data = $chartDone[Carbon::parse($d->end)->month-1];
            $chartDone[Carbon::parse($d->end)->month-1]=$data+1;
        }
        foreach($dataPay as $d){
            $data = $chartPay[Carbon::parse($d->created_at)->month-1];
            $chartPay[Carbon::parse($d->created_at)->month-1]=$data+$d->gross_amount;
        }
        foreach($dataPending as $d){
            $data = $chartPending[Carbon::parse($d->created_at)->month-1];
            $chartPending[Carbon::parse($d->created_at)->month-1]=$data+$d->gross_amount;
        }
        foreach($dataFail as $d){
            $data = $chartFail[Carbon::parse($d->created_at)->month-1];
            $chartFail[Carbon::parse($d->created_at)->month-1]=$data+$d->gross_amount;
        }
        // dd($chartPay);

        return view('admin.index')->with(compact('penggunas', 'user', 'acaras', 'event', 'category', 'template', 'chartUser', 'monthUser', 'chartEvent', 'monthEvent', 'chartDone', 'chartPay', 'totalPay', 'chartPending', 'chartFail'));
    }
}
