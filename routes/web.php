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
Route::get('/event/add', [EventController::class, 'addEvent'])->middleware('user');
Route::get('/event/select', [EventController::class, 'selectEvent'])->middleware('user');
Route::get('/event/join', [EventController::class, 'joinedEvent']);
Route::get('/organizer', [EventController::class, 'organizerList']);

//profile
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/profile/edit', [ProfileController::class, 'edit'])->middleware('user');
Route::post('/profile/edit', [ProfileController::class, 'updateProfile'])->middleware('user');
Route::get('/profile/{email}', [ProfileController::class, 'view']);

//undangan
Route::get('/event/undangan', [EventController::class, 'undangan']);
// Route::get('/user', function() {
//     return view('user.test');
// });
