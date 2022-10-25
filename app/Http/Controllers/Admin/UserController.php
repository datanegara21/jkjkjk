<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\{User, Profile, Event, Liked};

class UserController extends Controller
{
    public function index() {
        $users = Profile::count();
        return view('admin.user-list')->with(compact('users'));
    }public function data_user() {
        $users = Db::table('profiles')->join('users', 'profiles.email','=','users.email')
            ->where('profiles.email', '!=', 'admin@get.id')
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
        $liked = Liked::where('profile_id', $profile->id);
        
        $event->delete();
        $liked->delete();
        $profile->delete();
        $user->delete();

        return redirect('admin/user')->withToastSuccess('Data dari '.$name.' telah berhasil dihapus');
    }public function edit_status(Request $request){
        $user = User::where('id', $request->user_id)->first();

        User::where('id', $request->user_id)->update([
            'status' => $request->status
        ]);

        return redirect('/admin/user')->withToastSuccess('Status dari pengguna '.$user->name.' telah diubah');
    }
}
