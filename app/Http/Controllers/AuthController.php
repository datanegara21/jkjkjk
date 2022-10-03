<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash, Mail};
use Illuminate\Http\JsonResponse;
use App\Mail\sendMail;
use App\Models\{Profile, User};

class AuthController extends Controller
{
    public function viewLogin() {
        return view('auth.login');
    }
    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            if(Auth::user()->role == 0){
                return redirect('/admin')->withToastSuccess('Login berhasil');
            }else{
                if(Auth::user()->status == 'banned'){
                    Auth::logout();
                    return redirect('/login')->withToastWarning('Akun anda terkena suspend, silahkan kontak admin');
                }
                return redirect('/')->withToastSuccess('Login berhasil');
            }
        }else{
            return redirect('login')->withToastError('Email atau password salah');
        }
    }
    public function viewRegister() {
        return view('auth.register');
    }
    public function register(Request $request) {
        $rules = [
            'name' => ['bail', 'required', 'string', 'min:3', 'max:255'],
            'email' => ['bail', 'required', 'string', 'email:dns', 'max:255', 'unique:users'],
            'password' => ['bail', 'required', 'string', 'min:8', 'confirmed'],
        ];
        $messages=[
            'name.min'=>'Nama tidak boleh kurang dari 3 karakter',
            'name.max'=>'Nama tidak boleh lebih dari 255 karakter',
            'email.email'=>'Format email tidak sesuai',
            'email.max'=>'email tidak boleh lebih dari 255 karakter',
            'email.unique'=>'Email sudah terdaftar',
            'password.min'=>'Kata sandi tidak boleh kurang dari 8 karakter',
            'password.confirmed'=>'Kata sandi berbeda',
        ];
        
        $request->validate($rules, $messages);

        Profile::create([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);
        $user = User::create([
            'email' => $request['email'],
            'name' => $request['name'],
            'password' => Hash::make($request['password']),
        ]);

        if($user) {
            Mail::to($user->email)->send(new sendMail($user->email));
            return new JsonResponse([
                'success' => true,
                'message' => 'bismilah'
            ], 200);
        }

        return $user;
    }
}
