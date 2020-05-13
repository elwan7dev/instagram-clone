@extends('layouts.app')
@section('title' , 'Posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="posts">
                    @if (count($posts) > 0)
                        @foreach ($posts as $post)
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <div class="profile-img mr-2">
                                    <a class="" href="#">
                                        <img src="{{ asset('avatar.jpg') }}"
                                            alt="{{Auth::user()->name}}'s profile picture">
                                    </a>
                                </div>
                                <div class="post-data">
                                    <h4>
                                        <a href="#">{{$post->user->name}}</a>
                                    </h4>
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
            <div class="col-md-4">
                <div class="right-content ">
                    <div class="user-profile mb-3">
                        <div class="profile-img mr-2">
                           
                            <a class="" href="/profile">
                                <img src="{{ asset('avatar.jpg') }}"
                                    alt="{{Auth::user()->name}}'s profile picture" >
                            </a>
                        </div>
                        <div class="profile-info">
                            <h4>
                                <a href='/profile' class="user-name"> {{Auth::user()->name}}</a>
                            </h4>
                            <h6>
                                {{Auth::user()->name}}
                            </h6>
                        </div>  
                    </div>
                    <div class="suggest d-none d-xl-block ">
                        <div class="card ">
                            <div class="card-header mb-1 mt-3 p-0">
                            
                                Suggestions For You
                                <a href="#" class="float-right">
                                    <span>See all</span>
                                </a>
                            </div>
                            <div class="card-body mb-2 p-0">
                                <ul class="users-list users-list-in-card">
                                    {{-- @foreach ($collection as $item) --}}
                                    <li class='user'>
                                        <div class='user-img mr-2'>
                                            <img src="{{ asset('avatar.jpg')}} " alt='Product Image' class='d-inline-block align-middle'>
                                        </div>
                                        <div class='user-info'>
                                            <h5>
                                                <a href='#' >User-Name</a>
                                            </h5>
                                            <a href="#">
                                                <span class='badge badge-primary float-right'>Follow</span>
                                            </a>
                                                 
                                            <h6> User-FullName</h6>
                                        </div>
                                    </li> 
                                    
                                    {{-- @endforeach --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="links pb-4">
                        <nav class="navbar navbar-expand-sm">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" rel="nofollow noopener noreferrer" target="_blank">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" rel="nofollow noopener noreferrer" target="_blank">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" rel="nofollow noopener noreferrer" target="_blank">Help</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" rel="nofollow noopener noreferrer" target="_blank">Press</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" rel="nofollow noopener noreferrer" target="_blank">Privacy</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" rel="nofollow noopener noreferrer" target="_blank">Terms</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" rel="nofollow noopener noreferrer" target="_blank">Top Accounts</a>
                                </li>
                               
                               {{--  <li class="nav-item">
                                    <span class="nav-link">Language
                                        <select aria-label="Switch Display Language" class="hztqj">
                                            <option value="af">Afrikaans</option>
                                            <option value="cs">Čeština</option>
                                        </select>
                                    </span>
                                </li> --}}
                            </ul>
                        </nav>
                        <span class="footer">© 2020 INSTAGRAM FROM ELWAN7DEV</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
