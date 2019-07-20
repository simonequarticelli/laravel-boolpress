@extends('layouts.app')

@section('content')
  <div class="container mt-2">
    <h3>{{$post->title}}</h3>
    <br>
  </div>
  <div class="container">
    {{$post->content}}<br>
    <br>
    <em>{{$post->author}} - {{$post->created_at}}</em><br>
    <br>
    <a class="btn btn-outline-primary"href="{{route('guest.home')}}">Back</a>
  </div>
@endsection
