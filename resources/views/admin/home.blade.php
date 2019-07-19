@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <table class="table table-dark">
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Slug</th>
      <th>Content</th>
      <th>Author</th>
      <th>Created</th>
      <th>Update</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
      <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->slug}}</td>
        <td>{{$post->content}}</td>
        <td>{{$post->author}}</td>
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
