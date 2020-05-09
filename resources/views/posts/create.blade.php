@extends('layouts.app')
@section('title' , 'Create Post')

@section('content')
    <div class="container">
        <h2>Create a Post</h2>  
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                placeholder="Title" id="title" autofocus  autocomplete required>
                @error('title')     
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="article-ckeditor">Body</label>
                <textarea rows="10" name="body" class="form-control @error('body') is-invalid @enderror"
                placeholder="Body Text" id="article-ckeditor" required></textarea>
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
