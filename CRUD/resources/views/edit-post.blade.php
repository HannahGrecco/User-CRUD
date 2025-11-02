@extends("layouts.default")

@section("title", "CRUD")

@section("content")

<div> 
    <form action="/edit-post/{{$post->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="min-h-screen flex items-center justify-center">
            <div class="flex flex-col items-center justify-center p-4 w-1/2 mx-auto mb-4">
                <fieldset class="fieldset bg-gray-100 border-1 border-primary rounded p-8 shadow-lg">
                    <h1>Edit Post</h1>
                    <input class="input input-primary mb-4" type="text" name='title' value='{{ $post->title }}' >
                    <textarea class="textarea textarea-primary mb-4" name="body">{{ $post->body }}</textarea>
                    <button class="btn btn-primary" type="submit">Update Post</button>
                </fieldset>
            </div>
           
        </div>     
    </form>
</div>


@endsection