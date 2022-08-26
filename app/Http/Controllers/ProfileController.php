<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Profile, User};

class ProfileController extends Controller
{
    public function index(){
        return view('profile');
    }
    public function edit(){
        if(!Auth::user()){
            return redirect('login')->withToastWarning('Login terlebih dahulu');
        }
        $user = Profile::where('email',Auth::user()->email)->first();
        return view('user.profile-edit')->with(compact('user'));
    }
    public function view($email){
        if(Auth::check() && Auth::user()->email == $email){
                return redirect('profile');
        }else{
            return view('profile');
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
            $user->update(['email' => $request->email]);
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
}
