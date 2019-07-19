@extends('layouts.app')

@section('content')
  <div class="container">
    <form method="post" action="{{route('admin.post.store')}}" class="w-25">
      @csrf
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
        <input type="text" name="author" class="form-control" placeholder="Enter author">
      </div>
      <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" placeholder="Enter title">
      </div>
      <div class="form-group">
        <label>Content</label>
        <textarea name="content" rows="8" cols="80" placeholder="Enter content"></textarea>
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
      <button type="submit" class="btn btn-outline-success">Add</button>
    </form>
  </div>
@endsection
