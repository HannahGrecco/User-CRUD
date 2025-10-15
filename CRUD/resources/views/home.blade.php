@extends("layouts.default")

@section("title", "Register")

@section("content")

    @auth
      <p>Congrats, youre login</p>
      <form action="/logout" method="POST">
            @csrf
            <button>Log out</button>
    </form>
    @else
     <div>
        <h1>Register</h1>
        <form action="/register" method="POST">
            @csrf
            <input name='name' type="text" placeholder="Name">
            <input name='email' type="email" placeholder="Email">
            <input name='password' type="password" placeholder="Password">
            <button type="submit">Submit</button>
        </form>
    </div>
    <div>
        <h1>Log-in</h1>
        <form action="/login" method="POST">
            @csrf
            <input name='loginname' type="text" placeholder="Name">
            <input name='loginpassword' type="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </div>
    @endauth

   