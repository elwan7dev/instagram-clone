@extends('layouts.app')
@section('title' , 'Posts')

@section('content')
    <div class="container">
        @if (count($posts) > 0)
            <h2>Posts</h2>  
            @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                    </h4>
                    <h6 class="card-subtitle mb-3 text-muted">
                        Created at: {{$post->created_at}} 
                    </h6>
                    <p class="card-text">{{$post->body}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            @endforeach
            
        {{ $posts->links() }}
        @else
            <div class="alert alert-warning" role="alert">No Posts Found</div>
        @endif
    </div>
    
@endsection
