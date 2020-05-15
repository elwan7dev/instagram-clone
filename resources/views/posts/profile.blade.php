@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="posts">
                @if (count($posts) > 0)
                    <h2>Profile</h2> 
                    @foreach ($posts as $post)
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <div class="profile-img mr-2">
                                <a class="" href="#">
                                    <img src="/storage/avatars/{{$post->user->avatar}} "
                                        alt="{{Auth::user()->full_name}}'s profile picture">
                                </a>
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
                    </div>
                    @endforeach
                
                @else
                    <div class="alert alert-warning" role="alert">No Posts Found</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
