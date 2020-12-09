@extends('layouts.app')
@section('title' , 'Post')
{{-- show one post --}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                {{-- <a href="{{ URL::previous() }}" class="btn btn-outline-dark mb-2">Go Back</a> --}}
                <div class="posts">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <div class="profile-img mr-2">
                                <img src="/storage/avatars/{{$post->user->avatar}} "
                                    alt="{{Auth::user()->full_name}}'s profile picture">
                            </div>
                            <div class="post-data">
                                <h5>
                                    <a href="#">{{$post->user->full_name}}</a>
                                </h5>
                                <h6>
                                    <a href="/posts/{{$post->id}}" class="text-muted" 
                                        title="{{ date('l, M d, o \a\t g:i A', strtotime($post->created_at)) }} ">
                                        {{ date('M d', strtotime($post->created_at))}} 
                                    </a>
                                </h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{$post->body}}</p>
                            <div class="post-image">
                                <a href="/posts/{{$post->id}}">
                                    <img src="/storage/images/{{$post->image}}" alt="Post Image" class="mb-2" style="width: 100%">
                                </a>
                            </div>
                        </div>
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
