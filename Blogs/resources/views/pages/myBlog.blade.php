@extends('layouts.pages')

@section('content')
    <h1>Welcome, {{auth() -> user()->name}}</h1>
    @foreach($blogs as $blogElem)
        <div class="card mb-3">

            <div class="card-body">
                <h5 class="card-title">{{$blogElem->title}}</h5>
                <p class="card-text">{{$blogElem->tag}}</p>
                <p class="card-text" id="text">{{$blogElem->text}}</p>
                <p class="card-text"><small class="text-muted">Last updated {{$blogElem->time}}</small></p>
            </div>
            <div class="buttons">
                <a href="/delete-blog/{{$blogElem->id}}" style="width: 100px">delete</a>
                <a href="/edit-blog/{{$blogElem->id}}" style="width: 100px">edit</a>
            </div>

        </div>
    @endforeach


@endsection
