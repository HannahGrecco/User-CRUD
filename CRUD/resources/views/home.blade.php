@extends("layouts.default")

@section("title", "Register")

@section("content")

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