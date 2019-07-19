<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;

class PublicController extends Controller
{
  public function index() {
    $posts = Post::all();
    return view('guest.home', compact('posts'));
  }

  public function show($slug) {
    // uso where per selezionare la colonna e first per prendere il primo
    $post = Post::where('slug', $slug)->first();

    return view('guest.show', compact('post'));
  }
}
