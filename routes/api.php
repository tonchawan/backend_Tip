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

Route::post('/subscribe', [SubscriberController::class, 'subscribe']);

Route::resource('/tip/register', RegisterController::class);
Route::post('/login', [RegisterController::class, 'checkPassword']);

Route::get('/buy', [OrderController::class, 'index']);

Route::get('/package', [PackgesController::class, 'index']);
Route::post('/package', [PackgesController::class, 'store']);

Route::get('/buy', [OrderController::class, 'index']);
Route::post('/buy', [OrderController::class, 'store']);
