@extends('layout')
@section('content')
<h1>HELLO WELCOME</h1>
<a href="/logout">log out</a>

<div class="container">
    <div class="card">
        <div class="card-header">Chats</div>
        <div class="card-body">

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
