@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <table class="table table-dark">
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Slug</th>
      <th>Genre</th>
      <th>Content</th>
      <th class="text-center">Tag</th>
      <th class="text-center">Author</th>
      <th >Created</th>
      <th >Update at</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
      <tr>
        <td>{{$post->id}}</td>
        <td style="max-width: 300px;">{{$post->title}}</td>
        <td style="max-width: 300px;">{{$post->slug}}</td>
        <td style="max-width: 300px;">{{$post->genre ? $post->genre['name'] : 'n.a.'}}</td>
        <td class="text-truncate" style="max-width: 200px;">{{$post->content}}</td>
        <td class="text-center" style="min-width: 200px;">
          @if (($post->tags)->isNotEmpty())
          @foreach ($post->tags as $tag)
            {{$tag->name}}<br>
          @endforeach
            @else
              ---
            @endif
        </td>
        <td class="text-center">{{$post->author}}</td>
        <td>{{$post->created_at}}</td>
        <td>{{$post->updated_at}}</td>
        <td class="d-flex">
          <a class="btn btn-outline-light"href="{{route('admin.post.show', $post->id)}}">Show</a>
          <a class="btn btn-outline-warning"href="{{route('admin.post.edit', $post->id)}}">Modify</a>

          <form action="{{route('admin.post.destroy', $post->id)}}" method="post">
            @method('DELETE')
            @csrf
            <input class="btn btn-outline-danger" type="submit" value="Delete">
          </form>

        </td>
      </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
