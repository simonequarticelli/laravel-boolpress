<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Genre;

class PublicController extends Controller
{
  public function show_category($category_slug) {
    // dd($category_slug);
    $genre = Genre::where('slug', $category_slug)->first();
    $posts = $genre->posts; // <-- posts richiamo la funzione della relazione

    return view('guest.category')->with([
      'genre' => $genre,
      'posts' => $posts
    ]);
  }

  public function index() {
    $posts = Post::orderBy('id', 'desc')->limit(5)->get();
    //dd($posts);
    return view('guest.home', compact('posts'));
  }

  public function show($title_slug) {
    //dd($title_slug);
    // uso where per selezionare la colonna e first per prendere il primo
    $post = Post::where('slug', $title_slug)->first();

    return view('guest.show', compact('post'));
  }
}
