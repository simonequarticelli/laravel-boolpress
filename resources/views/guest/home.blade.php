@extends('layouts.app')

@section('content')
  <div class="container mt-2">
    <h2>LAST FIVE POSTS</h2>
    <ul class="mt-4 list-unstyled">
      @foreach ($posts as $post)
        {{-- @php
          dd($post->tags);
        @endphp --}}
        <li>
          <a href="{{route('guest.show', $post->slug)}}">{{$post->title}}</a> - <em>{{$post->author}}
          {{$post->genre ? ' - ' : ''}}
          <strong>
            {{-- <a href="{{route('guest.category', $post->genre['slug'])}}"> --}}
            {{$post->genre ? $post->genre['name'] : ''}}</a></strong> -
            @foreach ($post->tags as $tag)
                <em class="text-danger text-uppercase">{{$tag->name}}@if(!$loop->last),@endif</em>
            @endforeach
            {{$post->created_at}}</em>
        </li>
        <br>
      @endforeach
    </ul>
  </div>
@endsection
