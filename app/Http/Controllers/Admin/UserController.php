<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Profile, Event};

class UserController extends Controller
{
    public function index() {
        $users = Profile::count();
        return view('admin.user-list')->with(compact('users'));
    }public function data_user() {
        $users = Profile::join('users', 'profiles.email','=','users.email')
            ->orderBy('users.id','desc')
            ->get();

        return response()->json([
            'data' => $users
        ]);
    }public function delete_user($id_user){
        $user = User::where('id',$id_user)->first();
        $name = $user->name;
        $profile = Profile::where('email',$user->email)->first();
        $event = Event::where('profile_id',$profile->id);
        
        $event->delete();
        $profile->delete();
        $user->delete();

        return redirect('admin/user')->withToastSuccess('Data dari '.$name.' telah berhasil dihapus');
    }
}
