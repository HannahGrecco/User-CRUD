@extends("layouts.default")

@section("title", "CRUD")

@section("content")

    @auth
    <div class="min-h-screen ml-8 mr-8">
        <p class="text-center p-4">Welcome back! You're logged in.</p>
    
        <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-error mb-4">Log out</button>
         </form>

    <div class="bg-gray-100 flex flex-col items-center justify-center p-4 mb-4">
        <h2 class="font-semibold">Create a new post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <fieldset class="fieldset">
                 <input class="input input-primary mb-4" type="text" name='title' placeholder='Post title'>
                 <textarea class="textarea textarea-primary mb-4" name="body" placeholder="body content"></textarea>
                 <button class="btn btn-primary" type="submit">Save Post</button>
        
            </fieldset>
           
        </form>
    </div>


    <div class="bg-gray-100 flex flex-col p-8 mb-4" >
        <h2 class="font-bold mb-4 text-2xl ">All posts</h2>
        @foreach ($posts as $post)
            <div class="bg-gray-50 border-1 border-primary rounded p-6 mb-4">
                <p>Author: {{$post->author->name}}</p>
                <hr>
                <h3 class="font-semibold">{{ $post->title }}</h3>
                <p>{{ $post->body }}</p>
                <p><a href="/edit-post/{{ $post->id }}">Edit</a></p>
                <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
        @endforeach
    </div>
    </div>
    

    @else
    <div class="min-h-screen flex flex-col md:flex-row items-center justify-center space-y-8 md:space-y-0 md:space-x-8 lg:space-x-24 bg-gray-300">
        <div class="border-2 border-primary bg-gray-100 p-24 rounded-lg shadow-lg">
        <h1>Register</h1>
            <form action="/register" method="POST">
            <fieldset class="fieldset">
                 @csrf
            <input class="input input-primary mb-4" name='name' type="text" placeholder="Name">
            <input class="input input-primary mb-4" name='email' type="email" placeholder="Email">
            <input class="input input-primary mb-4" name='password' type="password" placeholder="Password">
            <button class="btn btn-primary" type="submit">Submit</button>
            </fieldset>
           
        </form>
        
    </div>
    <div class="border-2 border-primary bg-gray-100 p-31 rounded-lg shadow-lg">
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
            <input class="input input-primary mb-4" name='loginname' type="text" placeholder="Name">
            <input class="input input-primary mb-4" name='loginpassword' type="password" placeholder="Password">
            <button class="btn btn-primary" type="submit">Login</button>
            </fieldset>
           
        </form>
    </div>
    </div>
     
    @endauth

@endsection