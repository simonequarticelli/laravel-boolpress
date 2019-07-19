@extends('layouts.app')

@section('content')
  <div class="container mt-2">
    <h3>{{$post->author}}</h3>
  </div>
  <div class="container">
    <strong>Title: </strong>{{$post->title}}<br>
    <br>
    <strong>Content: </strong>{{$post->content}}<br>
    <br>
    <em>{{$post->created_at}}</em><br>
    <br>
    <a class="btn btn-outline-primary"href="{{route('guest.home')}}">Back</a>
  </div>
@endsection
