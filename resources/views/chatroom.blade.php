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
            <form action="/">
                <div class="d-flex p-2">
                    <input class="form-control" type="text" name="" id="" placeholder="Type message here">
                    <button class="btn btn-primary" type="submit">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
