@extends('layouts.app')
@section('title' , 'Post')
{{-- show one post --}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <a href="{{ URL::previous() }}" class="btn btn-outline-dark mb-2">Go Back</a>
                <div class="card mb-3 shadow-lg">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{$post->title}}
                        </h4>
                        <h6 class="card-subtitle mb-3 text-muted">
                            Created at: {{$post->created_at}} 
                        </h6>
                        <p class="card-text">{{$post->body}}</p>

                        @if (Auth::user()->id == $post->user_id)
                            <div class="card-footer bg-white">
                                {{-- The route helper will automatically extract the model's primary key: --}}
                                <a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-success">Edit</a>
            
                                {{-- The route helper will automatically extract the model's primary key: --}}
                                <form action="{{ route('posts.destroy', ['post'=>$post]) }}" method="POST" class="float-right">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        @endif
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
