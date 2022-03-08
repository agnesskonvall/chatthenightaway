@include('errors')

<form method="post" action="/register">
    @csrf
    <div>
        <label for="username">Username</label>
        <input name="username" id="username" type="username" />
    </div>
    <div>
        <label for="email">Email</label>
        <input name="email" id="email" type="email" />
    </div>
    <div>
        <label for="password">Password</label>
        <input name="password" id="password" type="password" />
    </div>
    <div>
        <input type="color" id="color" name="color" value="#e66465">
        <label for="color">Choose a color</label>
    </div>
    <button type="submit">Register</button>
</form>
