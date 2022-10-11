<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};
use App\Models\{Profile, User, Event};

class ProfileController extends Controller
{
    public function index(Request $request){
        $edit = true;
        $profile = Profile::where('email', Auth::user()->email)->first();
        $url = '/profile';

        if($request->show == 'new') {
            $events = Event::where('profile_id', $profile->id)->where('end', '>', now()) ->get();
        } elseif($request->show == 'miss') {
            $events = Event::where('profile_id', $profile->id)->where('end', '<', now()) ->get();
        } else {
            $events = Event::where('profile_id', $profile->id)->get();
        }

        return view('profile')->with(compact('edit', 'profile', 'events', 'url'));
    }
    public function edit(){
        if(!Auth::user()){
            return redirect('login')->withToastWarning('Login terlebih dahulu');
        }
        $user = Profile::where('email',Auth::user()->email)->first();
        return view('user.profile-edit')->with(compact('user'));
    }
    public function view(Request $request, $email){
        if(Auth::check() && Auth::user()->email == $email){
            return redirect('profile');
        }else{
            $profile = Profile::where('email', $email)->firstOrFail();
            $url = '/profile/'.$email;

            if($request->show == 'new') {
                $events = Event::where('profile_id', $profile->id)->where('end', '>', now()) ->get();
            } elseif($request->show == 'miss') {
                $events = Event::where('profile_id', $profile->id)->where('end', '<', now()) ->get();
            } else {
                $events = Event::where('profile_id', $profile->id)->get();
            }

            return view('profile')->with(compact('profile', 'events', 'url'));
        }
    }
    public function updateProfile(Request $request){
        $profile = Profile::where('email',Auth::user()->email)->first();
        $user = User::where('id', Auth::user()->id)->first();

        $messages = [
            'profile_avatar.max' => 'Foto profil tidak boleh lebih dari 5MB',
            'email.email' => 'Format email tidak sesuai',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter',
            'email.min' => 'Email tidak boleh kurang dari 3 karakter',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter',
            'name.min' => 'Name tidak boleh kurang dari 3 karakter',
            'name.max' => 'Name tidak boleh lebih dari 255 karakter',
            'email.unique' => 'Email sudah terdaftar',
            'description.min' => 'Deskripsi tidak boleh kurang dari 3 karakter',
            'description.max' => 'Deskripsi tidak boleh lebih dari 500 karakter',
            'whatsapp.integer' => 'Whatsapp tidak bisa diisi selain angka',
            'whatsapp.min' => 'Whatsapp tidak boleh kurang dari 8 angka',
            'whatsapp.max' => 'Whatsapp tidak boleh lebih dari 15 angka',
            'facebook.min' => 'Facebook tidak boleh kurang dari 5 karakter',
            'facebook.max' => 'Facebook tidak boleh lebih dari 255 karakter',
            'instagram.min' => 'Instagram tidak boleh kurang dari 3 karakter',
            'instagram.max' => 'Instagram tidak boleh lebih dari 255 karakter',
            'twitter.min' => 'Twitter tidak boleh kurang dari 3 karakter',
            'twitter.max' => 'Twitter tidak boleh lebih dari 255 karakter',
            'website.min' => 'Website tidak boleh kurang dari 3 karakter',
            'website.max' => 'Website tidak boleh lebih dari 255 karakter',
        ];

        $validate = $request->validate([
            'profile_avatar' => 'bail|nullable|max:5120',
            'email' => 'bail|nullable|email:dns|max:255|unique:users,email,'.$user->id,
            'name' => 'bail|nullable|min:3|max:255',
            'description' => 'bail|nullable|min:3|max:500',
            'whatsapp' => 'bail|nullable|integer|min:10000000|max:999999999999999',
            'facebook' => 'bail|nullable|min:5|max:255',
            'instagram' => 'bail|nullable|min:3|max:255',
            'twitter' => 'bail|nullable|min:3|max:255',
            'website' => 'bail|nullable|min:3|max:255',
        ], $messages);
        
        if($request->profile_avatar){
            $avatar = $request->file('profile_avatar');
            $avatarName = time().".".$avatar->extension();
            $avatarLoc = 'assets/media/profile';
            $avatarNames = $avatarLoc.'/'.$avatarName;
            $avatar->move(public_path($avatarLoc),$avatarName);

            $profile->update(['image' => $avatarNames]);
        }
        if($request->name){
            $profile->update(['name' => $request->name]);
            $user->update(['name' => $request->name]);
        }
        if($request->email){
            $profile->update(['email' => $request->email]);
            $user->update(['email' => $request->email, 'email_verified_at' => null]);
        }
        if($request->description){
            $profile->update(['description' => $request->description]);
        }
        if($request->whatsapp){
            $profile->update(['whatsapp' => $request->whatsapp]);
        }
        if($request->facebook){
            $profile->update(['facebook' => $request->facebook]);
        }
        if($request->instagram){
            $profile->update(['instagram' => $request->instagram]);
        }
        if($request->twitter){
            $profile->update(['twitter' => $request->twitter]);
        }
        if($request->website){
            $profile->update(['website' => $request->website]);
        }
        
        return redirect('profile/edit')->withToastSuccess('Data berhasil diubah');
    }
    public function updatePassword(Request $request) {
        $profile = Profile::where('email', Auth::user()->email)->first();

        
        $messages = [
            'new_password.min' => 'Password baru tidak boleh kurang dari 8 karakter',
            'new_password.max' => 'Password baru tidak boleh lebih dari 255 karakter',
            'new_password.different' => 'Password lama sama dengan password baru',
            'confirm_password' => 'Password baru dan konfirmasi password tidak sama'
        ];
        
        
        $validate = $request->validate([
            'old_password' => 'bail|required',
            'new_password' => 'bail|required|min:8|max:255|different:old_password',
            'confirm_password' => 'bail|required|same:new_password'
        ], $messages);
        
        if(!Hash::check($request->old_password, Auth::user()->password)){
            return redirect('profile/edit')->withToastError('Password lama tidak sesuai');
        }

        User::where('email',Auth::user()->email)->update([
            'password' => bcrypt($request->new_password)
        ]);
        return redirect('profile/edit')->withToastSuccess('Password Berhasil Diganti');
    }
}
