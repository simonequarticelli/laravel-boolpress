@extends('layouts.app')

@section('content')
  <div class="container mt-2">
    <h2>Posts {{$genre->slug}}</h2>
    <ul class="mt-4 list-unstyled">
      @foreach ($posts as $post)
        <li>
          <a href="{{route('guest.show', $post->slug)}}">{{$post->title}}</a> -
          <em>{{$post->author}} - @foreach ($post->tags as $tag)
              <em class="text-danger text-uppercase">{{$tag->name}}@if(!$loop->last),@endif</em>
          @endforeach{{$post->created_at}}</em>
        </li>
        <br>
      @endforeach
    </ul>
    <a class="btn btn-outline-primary"href="{{route('guest.home')}}">Back</a>
  </div>
@endsection
