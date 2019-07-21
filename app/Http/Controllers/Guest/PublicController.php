<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Genre;

class PublicController extends Controller
{
  public function show_category($slug) {
    
    $genre = Genre::where('slug', $slug)->first();
    $posts = $genre->posts;

    return view('guest.category')->with([
      'genre' => $genre,
      'posts' => $posts
    ]);
  }

  public function index() {
    $posts = Post::orderBy('id', 'desc')->limit(5)->get();
    return view('guest.home', compact('posts'));
  }

  public function show($slug) {
    // uso where per selezionare la colonna e first per prendere il primo
    $post = Post::where('slug', $slug)->first();

    return view('guest.show', compact('post'));
  }
}
