<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Profile, EventTemplate, EventCategory, Event};
use Hamcrest\Core\AllOf;

class AdminController extends Controller
{
    public function index(){
        $user = Profile::count();
        $penggunas = Profile::limit(5)->get();
        $event = Event::count();
        $acaras = Event::limit(5)->get();
        $category = EventCategory::count();
        $template = EventTemplate::count();

        return view('admin.index')->with(compact('penggunas', 'user', 'acaras', 'event', 'category', 'template'));
    }
}
