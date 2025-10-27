@extends("layouts.default")

@section("title", "CRUD")

@section("content")

<div>
    <h1>Edit Post</h1>
    <form action="/edit-post/{{$post->id}}" method="POST">
        @csrf
        @method('PUT')
        <fieldset class="fieldset">
         <input class="input input-primary mb-4" type="text" name='title' value='{{ $post->title }}' >
         <textarea class="textarea textarea-primary mb-4" name="body">{{ $post->body }}</textarea>
         <button class="btn btn-primary" type="submit">Update Post</button>

        </fieldset>
    </form>
</div>


@endsection