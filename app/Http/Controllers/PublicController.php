<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PublicController extends Controller
{
  public function index() {
    $posts = Post::all();
    return view('public-home', compact('posts'));
  }
}
