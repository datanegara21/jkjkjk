<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{UserController, EventController};
use App\Http\Controllers\{ApiController, PaymentController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//admin
Route::prefix('admin')->group( function(){
    Route::post('/user/data', [UserController::class, 'data_user']);
    Route::post('/event/data', [EventController::class, 'data_event']);
});

//payment
Route::post('payment-handler', [ApiController::class, 'payment_handler']);
Route::post('transaction/data', [PaymentController::class, 'data_transaction']);