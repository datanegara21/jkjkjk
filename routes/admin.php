<?php

use Illuminate\Support\Facades\{Route, Auth};

use App\Http\Controllers\Admin\{TemplateController};

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

Route::middleware('admin')->prefix('admin')->group(function () {
    //Home
    Route::get('/', [TemplateController::class, 'index']);

    //Event
    Route::controller(TemplateController::class)->group(function (){
        Route::get('template', 'index');
    });
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
