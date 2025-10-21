@extends("layouts.default")

@section("title", "Register")

@section("content")

    @auth
    <p>Congrats, youre login</p>
    
    <form action="/logout" method="POST">
            @csrf
            <button>Log out</button>
    </form>

    <div>
        <h2 class="bg-amber-400">Create a new post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name='title' placeholder='Post title'>
            <textarea name="body" placeholder="body content"></textarea>
            <button type="submit">Save Post</button>
        
        </form>
    </div>


    <div class="bg-blue-200" >
        <h2>All posts</h2>
        @foreach ($posts as $post)
            <div>
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->body }}</p>
            </div>
        @endforeach
    </div>

    @else
    <div class="min-h-screen flex flex-col md:flex-row items-center justify-center space-y-8 md:space-y-0 md:space-x-8 lg:space-x-24 bg-gray-300">
        <div class="border-2 bg-gray-100 p-24 rounded-lg shadow-lg">
        <h1>Register</h1>
            <form action="/register" method="POST">
            <fieldset class="fieldset">
                 @csrf
            <input class="input mb-4" name='name' type="text" placeholder="Name">
            <input class="input mb-4" name='email' type="email" placeholder="Email">
            <input class="input mb-4" name='password' type="password" placeholder="Password">
            <button class="btn btn-primary" type="submit">Submit</button>
            </fieldset>
           
        </form>
        
    </div>
    <div class="border-2 bg-gray-100 p-31 rounded-lg shadow-lg">
        <h1>Log-in</h1>
        <!--se dados estiverem incorretos -> mostra mensagem de dados incorretos para o usuário-->
        @if($errors->any())
            <div style="color: red;">
            {{ $errors->first('loginname') }}
            </div>
        @endif
        
        <form action="/login" method="POST">
            <fieldset class="fieldset  ">
                 @csrf
            <input class="input mb-4" name='loginname' type="text" placeholder="Name">
            <input class="input mb-4" name='loginpassword' type="password" placeholder="Password">
            <button class="btn btn-primary" type="submit">Login</button>
            </fieldset>
           
        </form>
    </div>
    </div>
     
    @endauth

   