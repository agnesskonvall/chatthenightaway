<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('chatroom');
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'content' => 'required|string',
        ]);

        $message = new Message([
            'content' => $request->get('content'),
            'user_id' => $user->id
        ]);

        $message->save();

        return back();
    }
}
