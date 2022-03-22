@extends('layout')
@section('content')
<h1>HELLO WELCOME</h1>
<a href="/logout">log out</a>
<div class="container">
    <div class="card">
        <div class="card-header">Chats</div>
        <div class="card-body">
            @foreach ($messages as $message)
            @if ($message->content !== '0')

            <div class="message" id="{{$message->chatid}}"><span style="color: {{$message->color}}">{{$message->username}}:</span> {{$message->content}}
                @if ($user->id === $message->user_id)
                <a href='delete/{{$message->chatid}}' class="delete">Delete</a>
                @endif
            </div>
            @endif

            @endforeach
        </div>
        <div class="card-footer">
            <form action="sendmessage" method="POST">
                @csrf
                <div class="d-flex p-2">
                    <label for="content"></label>
                    <input class="form-control" type="text" name="content" id="content" placeholder="Type message here">
                    <button class="btn btn-primary" type="submit">Send</button>
                </div>
            </form>
            <form action="sendnudge" method="POST">
                @csrf
                <button>nudge</button>
            </form>
        </div>
    </div>
    <audio controls class="d-none">
        <source src="../css/media/nudge.mp3" type="audio/mpeg">
        Your browser does not support the html audio tag.
    </audio>
</div>
@endsection
