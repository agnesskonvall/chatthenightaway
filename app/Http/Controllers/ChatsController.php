<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Events\MessageSent;
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
        $messages = Message::select('*')
            ->join('users', 'users.id', '=', 'messages.user_id')
            ->orderBy('messages.created_at', "desc")
            ->limit(15)
            ->take(-10)
            ->get();
        $user = Auth::user();

        return view('chatroom', [
            'messages' => $messages->reverse(),
            'user' => $user
        ]);
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
        broadcast(new MessageSent($user, $message))->toOthers();
        return back();
    }
}
