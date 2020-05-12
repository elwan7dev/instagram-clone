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
                            <div class="card-body">
                                <div class="post-data">
                                    <h4 class="card-title">
                                        <a href="#">{{$post->user->name}}</a>
                                    </h4>
                                    
                                    <h6 class="card-subtitle mb-2 ">
                                        <a href="/posts/{{$post->id}}" class="text-muted" 
                                            title="{{ date('l, M d, o \a\t g:i A', strtotime($post->created_at)) }} ">
                                            {{ date('M d', strtotime($post->created_at))}} 
                                        </a>
                                    </h6>
                                    
                                    <p class="card-text mb-1">{{$post->body}}</p>
                                </div>
                                
                                <div class="post-image">
                                    <a href="/posts/{{$post->id}}">
                                        <img src="/storage/images/{{$post->image}}" alt="Post Image" class="mb-2" style="width: 100%">
                                    </a>
                                </div>
                                
                                {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
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
                    <div class="user-profile">
                        {{-- user photo --}}
                        <div class="RR-M-  _2NjG_" role="button" tabindex="0">
                            <canvas class="CfWVH" height="66" width="66" style="position: absolute; top: -5px; left: -5px; width: 66px; height: 66px;">
                            </canvas>
                            <a class="_2dbep qNELH kIKUG" href="/ahmedgalalelwan/" style="width: 56px; height: 56px;">
                                <img alt="ahmedgalalelwan's profile picture" class="_6q-tv" src="">
                            </a>
                        </div>
                        {{-- user-name --}}
                        <div class="_0v2O4 StX70">
                            <div class="SKguc">
                                <a class="gmFkV" href="/ahmedgalalelwan/">ahmedgalalelwan</a>
                            </div>
                            <div class="f5Yes oL_O8">
                                Ahmed Galal Elwan
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-xl-block suggest">
                        <div class="card shadow-sm ">
                            <div class="card-header">
                                Suggestions For You
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
    
                    </div>
                    <div class="links">
                        <nav class="uxKLF">
                            <ul class="ixdEe _9Rlzb">
                                <li class="K5OFK">
                                    <a class="l93RR" href="https://about.instagram.com/about-us" rel="nofollow noopener noreferrer" target="_blank">About</a>
                                </li>
                                <li class="K5OFK">
                                    <a class="l93RR" href="https://help.instagram.com/">Help</a>
                                </li>
                                <li class="K5OFK">
                                    <a class="l93RR" href="https://instagram-press.com/">Press</a>
                                </li>
                                <li class="K5OFK">
                                    <a class="l93RR" href="/developer/">API</a>
                                </li>
                                <li class="K5OFK">
                                    <a class="l93RR" href="/about/jobs/">Jobs</a>
                                </li>
                                <li class="K5OFK">
                                    <a class="l93RR" href="/legal/privacy/">Privacy</a>
                                </li>
                                <li class="K5OFK">
                                    <span class="_3G4x7  l93RR">Language
                                        <select aria-label="Switch Display Language" class="hztqj">
                                            <option value="af">Afrikaans</option>
                                            <option value="cs">Čeština</option>
                                        </select>
                                        
                                    </span>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                
                
            </div>
        </div>
        
    </div>
    
@endsection
