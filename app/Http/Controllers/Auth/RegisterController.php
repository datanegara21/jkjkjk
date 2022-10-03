<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\{User, Profile};
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::VERIFY;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
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
        return Validator::make($data, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        Profile::create([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
        return User::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
        ]);

    }
}
