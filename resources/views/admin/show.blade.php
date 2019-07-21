@extends('layouts.app')

@section('content')
  <div class="container">
    <strong>Id: </strong>{{$post->id}}<br>
    <br>
    <strong>Genre: </strong>{{$post->genre ? $post->genre['name'] : 'n.a.'}}<br>
    <br>
    <strong>Name: </strong>{{$post->author}}<br>
    <br>
    <strong>Title: </strong>{{$post->title}}<br>
    <br>
    <strong>Content: </strong>{{$post->content}}<br>
    <br>
    <strong>Tag: </strong>
    @if (($post->tags)->isNotEmpty())
    @foreach ($post->tags as $tag)
      {{$tag->name}}@if(!$loop->last),@endif
    @endforeach
    @else
      n.a.
    @endif
    <br>
    <br>
    <strong>Created at: </strong>{{$post->created_at}}<br>
    <br>
    <strong>Update at: </strong>{{$post->updated_at}}<br>
    <br>
    <a class="btn btn-dark"href="{{route('admin.home')}}">Back</a>
  </div>
@endsection
