@extends('layouts.app')

@section('content')
  <div class="container">
    <form method="post" action="{{route('admin.post.update', $post->id)}}">
      @csrf
      @method('PUT')

      <div style="position: relative;" class="form-group w-25">
        <label>Author</label>
        <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" placeholder="Enter author" value="{{ old('author', $post->author) }}">
        @error('author')
            <span class="invalid-tooltip" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div style="position: relative;"class="form-group w-25">
        <label>Title</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" value="{{ old('title', $post->title) }}">
        @error('title')
            <span class="invalid-tooltip" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div style="position: relative;" class="form-group w-50">
        <label>Content</label>
        <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="8" cols="80" placeholder="Enter content">{{ old('content', $post->content) }}</textarea>
        @error('content')
            <span class="invalid-tooltip" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="input-group mb-3 w-25">
        <div class="input-group-prepend">
          <label class="input-group-text">Category</label>
        </div>

        <select name="genre_id" class="custom-select">
          <option selected>{{$post->genre ? $post->genre->name : 'Choose...'}}</option>
          @foreach ($genres as $genre)
            <option value="{{$genre->id}}">{{$genre->name}}</option>
          @endforeach
        </select>

      </div>

      <a class="btn btn-dark"href="{{route('admin.home')}}">Back</a> <button type="submit" class="btn btn-success">Save</button>
    </form>
  </div>
@endsection
