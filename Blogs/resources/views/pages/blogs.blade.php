@extends('layouts.pages')

@section('content')


    <!--<form action="/add-blogs" method="post">-->
    @if(isset($edit_resource))
        <form action="/update-blogs" method="post">
    @else
        <form action="/add-blogs" method="post">
    @endif

        <div class="input-group mb-3">
            <label for="title">title</label>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                   @isset($edit_resource) value="{{$edit_resource->title}}" @endisset name="title">
        </div>

        @csrf
        <div class="input-group mb-3">
            <label for="tag">tag</label>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                   @isset($edit_resource) value="{{$edit_resource->tag}}" @endisset name="tag" >
        </div>
        <div class="input-group mb-3">
            <label for="time">Time</label>
            <input type="datetime-local"
                   @isset($edit_resource) value="{{$edit_resource->time}}" @endisset name="time">
        </div>
        <div class="input-group mb-3">
            <label for="text">Write Blog</label>
            <textarea class="form-control" style="height: 100px"
                      @isset($edit_resource)  @endisset name="text" ></textarea>

        </div>


        @if(@isset($edit_resource))
            <input type="hidden" value="{{$edit_resource}}" name="id">
            <button>update</button>
        @else
            <button>save</button>
        @endif
    </form>

@endsection




