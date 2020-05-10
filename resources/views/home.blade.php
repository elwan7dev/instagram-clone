@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (count($posts) > 0)
                <h2>Profile</h2> 
                @foreach ($posts as $post)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="#">{{$post->user->name}}</a>
                        </h4>
                        <h6 class="card-subtitle mb-3 text-muted">
                            Created at: {{$post->created_at}}
                        </h6>
                        <p class="card-text">{{$post->body}}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                @endforeach
            
            @else
                <div class="alert alert-warning" role="alert">No Posts Found</div>
            @endif
        </div>
    </div>
</div>
@endsection
