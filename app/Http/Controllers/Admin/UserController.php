<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Profile};

class UserController extends Controller
{
    public function index() {
        $users = Profile::count();
        return view('admin.user-list')->with(compact('users'));
    }public function data_user() {
        $users = Profile::orderBy('id', 'DESC')
            ->get();

        return response()->json([
            'data' => $users
        ]);
    }
}
