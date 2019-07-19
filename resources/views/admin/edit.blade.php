@extends('layouts.app')

@section('content')
  <div class="container">
    <form method="post" action="{{route('admin.post.update', $post->id)}}" class="w-25">
      @csrf
      @method('PUT')
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="form-group">
        <label>Author</label>
        <input type="text" name="author" class="form-control" placeholder="Enter author" value="{{ old('author', $post->author) }}">
      </div>
      <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" placeholder="Enter title" value="{{ old('title', $post->title) }}">
      </div>
      <div class="form-group">
        <label>Content</label>
        <textarea name="content" rows="8" cols="80" placeholder="Enter content">{{ old('content', $post->content) }}</textarea>
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text">Category</label>
        </div>
        <select class="custom-select">
          <option selected>Choose...</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
      </div>
      <button type="submit" class="btn btn-outline-success">Mod</button>
    </form>
  </div>
@endsection
