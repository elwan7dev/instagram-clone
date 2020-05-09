@extends('layouts.app')
@section('title' , 'Edit Post')

@section('content')
    <div class="container">
        <h2>Edit Post</h2>
        {{--['post' = $post->id] = ['post'=>$post] it use primary key of this object--}} 
        {{-- The route helper will automatically extract the model's primary key: --}}
        {{-- /posts/{{$post->id}} --}}
        <form action="{{ route('posts.update', ['post'=>$post]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                value="{{$post->title}} " id="title" autofocus required>
                @error('title')     
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="article-ckeditor">Body</label>
                <textarea rows="10" name="body" class="form-control @error('body') is-invalid @enderror"
                id="article-ckeditor" required>{{$post->body}}</textarea>
                @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
