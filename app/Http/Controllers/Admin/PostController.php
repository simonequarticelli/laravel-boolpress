<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Genre;

// percorso helper per slug
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    { 
      $posts = Post::orderBy('id', 'desc')->limit(5)->get();
      return view('admin.home', compact('posts'));
    }


    public function create()
    {
      $genres = Genre::all();
      return view('admin.create', compact('genres'));
    }


    public function store(Request $request)
    {
      $validateData = $request->validate([
        'title' => 'required|max:255|bail',
        'content' => 'required|max:500',
        'author' => 'required|max:255'
      ]);
      $dati = $request->all();
      //dd($dati);
      $dati['slug'] = Str::slug($dati['title']);
      $new_post = new Post();
      $new_post->fill($dati);
      $new_post->save();
      // dd($new_post);
      return redirect()->route('admin.home');
    }


    public function show($id)
    {
      $post = Post::find($id);
      return view('admin.show', compact('post'));
    }


    public function edit($id)
    {
      $genres = Genre::all();

      $post = Post::find($id);
      if (empty($post)) {
        abort(404);
      }
      return view('admin.edit')->with([
        'post' => $post,
        'genres' => $genres
      ]);
    }


    public function update(Request $request, $id)
    {
      $validateData = $request->validate([
        'title' => 'required|max:255|bail',
        'content' => 'required|max:500',
        'genre_id' => 'required',
        'author' => 'required|max:255'
      ]);
      $dati = $request->all();
      $post = Post::find($id);
      $post->update($dati);
      return redirect()->route('admin.home');
    }


    public function destroy($id)
    {
      $post = Post::find($id);
      $post->delete();
      return redirect()->route('admin.home');
    }
}
