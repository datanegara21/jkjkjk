<?php

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\{HomeController, EventController, ProfileController, AuthController};

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

// Route::get('/loginn', function() {
//     return view('auth.login0');
// });

// Auth::routes(['verify'=>true]);
Auth::routes();

// Route::get('login', [AuthController::class, 'viewLogin']);
// Route::post('login', [AuthController::class, 'login']);
// Route::get('register', [AuthController::class, 'viewRegister']);
// Route::post('register', [AuthController::class, 'register']);

//dashboard
Route::get('/', [HomeController::class, 'index'])->name('home');

//event
Route::get('/event/joined', [EventController::class, 'joinedEvent'])->name('joined')->middleware('user');
Route::name('event.')->group(function() {
    Route::get('/event', [EventController::class, 'listEvent']);
    Route::get('/event/select', [EventController::class, 'selectEvent'])->middleware('user');
    Route::post('/event/select', [EventController::class, 'requestEvent'])->middleware('user');
    Route::get('/event/add', [EventController::class, 'addEvent'])->middleware('user');
    Route::post('/event/add', [EventController::class, 'storeEvent'])->middleware('user');
    Route::get('/event/liked', [EventController::class, 'likedEvent'])->middleware('user');
    Route::get('/event/like/{event_id}', [EventController::class, 'likeEvent'])->middleware('user');
    Route::post('/event/template', [EventController::class, 'varTemplate'])->middleware('user');
    Route::get('/event/{id}', [EventController::class, 'index']);
    Route::post('/event/{id}', [EventController::class, 'joinEvent']);
    Route::get('/event/{id}/{email}', [EventController::class, 'viewInvitation']);
    Route::get('/event/{event_id}/{join_id}/{response}', [EventController::class, 'joinResponse'])->middleware('user');
    Route::get('/event/invitation/{id}', [EventController::class, 'toImage']);
});
Route::get('/organizer', [EventController::class, 'organizerList'])->name('organizer');

//profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware('user');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->middleware('user');
Route::post('/profile/edit', [ProfileController::class, 'updateProfile'])->middleware('user');
Route::post('/password/edit', [ProfileController::class, 'updatePassword'])->middleware('user');
Route::get('/profile/{email}', [ProfileController::class, 'view']);

//undangan
Route::get('/event/undangan', [EventController::class, 'undangan']);
// Route::get('/user', function() {
//     return view('user.test');
// });
