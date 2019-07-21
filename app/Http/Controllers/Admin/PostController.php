<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Genre;
use App\Tag;

// percorso helper per slug
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
      $posts = Post::orderBy('id', 'desc')->get();
      return view('admin.home', compact('posts'));
    }


    public function create()
    {
      $genres = Genre::all();
      $tags = Tag::all();
      return view('admin.create')->with([
        'genres' => $genres,
        'tags' => $tags
      ]);
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
      // passare a sync l'arrey delle checkbox (dopo aver fatto il save)
      $new_post->tags()->sync($dati['tag']);
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
      $tags = Tag::all();

      $post = Post::find($id);
      if (empty($post)) {
        abort(404);
      }
      return view('admin.edit')->with([
        'post' => $post,
        'genres' => $genres,
        'tags' => $tags
      ]);
    }


    public function update(Request $request, $id)
    {
      $validateData = $request->validate([
        'title' => 'required|max:255|bail',
        'content' => 'required',
        'author' => 'required|max:255'
      ]);
      $dati = $request->all();
      $post = Post::find($id);
      // passare a sync l'arrey delle checkbox
      $post->tags()->sync($dati['tag']);
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
