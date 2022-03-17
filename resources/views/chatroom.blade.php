@extends('layout')
@section('content')
<h1>HELLO WELCOME</h1>
<a href="/logout">log out</a>
<div class="container">
    <div class="card">
        <div class="card-header">Chats</div>
        <div class="card-body">
            @foreach ($messages as $message)

            <div class="message" id="message">{{$message->username}}: {{$message->content}}
                @if ($user->id === $message->user_id)
                <button action="delete" class="delete">Delete</button>
                @endif

            </div>
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
        </div>
    </div>
</div>
@endsection
