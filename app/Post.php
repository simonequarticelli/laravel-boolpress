<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = ['title', 'slug', 'genre_id', 'content', 'author', 'created_at', 'update_at'];

  public function genre() {
    return $this->belongsTo('App\Genre');
  }
}
