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

// Route::get('/test', function () {
//     $message = new Message([
//         'content' => "test",
//         'user_id' => Auth::user()->id
//     ]);

//     dd($message->save());
// });

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::post('/chatroom', function () {
    return view('chatroom');
})->middleware('auth');

Route::post('login', LoginController::class)->middleware('guest');
Route::post('register', RegisterController::class)->middleware('guest');
Route::get('/chatroom', [App\Http\Controllers\ChatsController::class, 'index'])->middleware('auth');
Route::get('/messages', [App\Http\Controllers\ChatsController::class, 'fetchMessages'])->middleware('auth');
Route::post('sendmessage', [App\Http\Controllers\ChatsController::class, 'sendMessage'])->middleware('auth');
Route::post('sendnudge', [App\Http\Controllers\ChatsController::class, 'sendNudge']);
Route::get('signup', SignupController::class)->middleware('guest');
Route::get('logout', LogoutController::class)->middleware('auth');
Route::get('/delete/{id}', [App\Http\Controllers\ChatsController::class, 'deleteMessage'])->middleware('auth');
