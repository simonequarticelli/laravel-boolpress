@extends('layouts.app')

@section('content')
  <div class="container mt-2">
    <h2>ALL POSTS</h2>
    <ul class="mt-4 list-unstyled">
      @foreach ($posts as $post)
        <li>
          <strong>Name: </strong>{{$post->author}}<br>
          <strong>Title: </strong><a href="{{route('guest.show', $post->slug)}}">{{$post->title}}</a><br>
          <strong>Created at: </strong>{{$post->created_at}}
        </li>
        <br>
      @endforeach
    </ul>
  </div>
@endsection
