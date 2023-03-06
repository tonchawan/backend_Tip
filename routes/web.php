<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', 'RegisterController@index');
Route::post('/user', 'RegisterController@[methodName]');
Route::put('/user/{id}', 'RegisterController@[methodName]');
Route::delete('/user/{id}', 'RegisterController@[methodName]');
