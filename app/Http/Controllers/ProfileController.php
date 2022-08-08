<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

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
}
