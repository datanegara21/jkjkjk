<?php

use Illuminate\Support\Facades\{Route, Auth};

use App\Http\Controllers\Admin\{TemplateController, AdminController, UserController, EventController};

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

// Auth::routes();

Route::middleware('admin')
->prefix('admin')
->group(function () {
    //Home
    Route::get('/', [AdminController::class, 'index'])->name('homeAdmin');

    //Event Template
    Route::controller(TemplateController::class)
    ->name('template.')
    ->group(function (){
        Route::get('template', 'index');
        //type
        Route::post('template/add', 'addType');
        Route::post('template/edit/{id_template}', 'editType');
        Route::get('template/delete/{id_template}', 'deleteType');
        Route::post('template/template', 'varTemplate');
        //template
        Route::post('template/{id_category}/add', 'addTemplate');
        Route::post('template/template/edit/{id_template}', 'editTemplate');
        Route::get('template/template/delete/{id_template}', 'deleteTemplate');
    });

    //User
    Route::controller(UserController::class)
    ->name('user.')
    ->group(function() {
        Route::get('user', 'index');
        Route::get('user/delete/{id_user}', 'delete_user');
        Route::get('user/status', 'edit_status');
    });

    //Event
    Route::controller(EventController::class)
    ->name('event.')
    ->group(function() {
        Route::get('event', 'index');
        Route::get('event/delete/{event_id}', 'delete_event');
    });
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
