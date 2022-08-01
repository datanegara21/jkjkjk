<?php

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\{HomeController, EventController, ProfileController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/loginn', function() {
    return view('auth.login0');
});

Auth::routes();

//event
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/detail', [EventController::class, 'index']);
Route::get('/event', [EventController::class, 'listEvent']);

//profile
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/profile/edit', [ProfileController::class, 'edit']);

// Route::get('/user', function() {
//     return view('user.test');
// });
