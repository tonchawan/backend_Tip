<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PackgesController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/subscribe', [SubscriberController::class, 'subscribe']);

Route::resource('/tip/register', RegisterController::class);
Route::post('/login', [RegisterController::class, 'checkPassword']);


Route::get('/package', [PackgesController::class, 'index']);
Route::post('/package', [PackgesController::class, 'store']);


Route::get('/loadPdf/{id}', [OrderController::class, 'loadPdf']);
Route::resource('/buy', OrderController::class); //get, get by userid, post(OrderStatus = 1), put(OrderStatus = 1) ,delete
Route::post('/saveDraf' , [Ordercontroller::class, 'saveDraf']);
Route::put('/updateDraf/{id}' , [Ordercontroller::class, 'updateDraf']);
Route::get('/report/{userId}', [OrderController::class, 'getReport']);
Route::get('/getOrder/{id}', [OrderController::class, 'orderId']);






