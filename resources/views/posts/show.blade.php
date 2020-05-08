@extends('layouts.app')
@section('title' , 'Post')
{{-- show one post --}}
@section('content')
    <div class="container col-md-6">
        <a href="{{ url('/posts')}}" class="btn btn-outline-dark mb-2">Go Back</a>
        <div class="card mb-3 shadow-lg">
            <div class="card-body">
                <h4 class="card-title">
                    {{$post->title}}
                </h4>
                <h6 class="card-subtitle mb-3 text-muted">
                    Created at: {{$post->created_at}} 
                </h6>
                <p class="card-text">{{$post->body}}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
@endsection
