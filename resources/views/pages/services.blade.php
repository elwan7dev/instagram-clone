@extends('layouts.app')
@section('title' , 'Services')

@section('content')
    <div class="container">
        <h1>{{$title}} </h1>
        <ul class="list-group">
            @foreach ($services as $service)
                <li class="list-group-item">{{$service}} </li>
            @endforeach
        </ul>
    </div>
@endsection
