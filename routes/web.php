<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SignupController;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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



Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::post('/chatroom', function () {
    return view('chatroom');
});

Route::post('login', LoginController::class)->middleware('guest');
Route::post('register', RegisterController::class);
Route::get('/chatroom', [App\Http\Controllers\ChatsController::class, 'index'])->middleware('auth');
Route::get('/messages', [App\Http\Controllers\ChatsController::class, 'fetchMessages'])->middleware('auth');
Route::post('/messages', [App\Http\Controllers\ChatsController::class, 'sendMessage'])->middleware('auth');
Route::get('signup', SignupController::class)->middleware('guest');
Route::get('logout', LogoutController::class);
