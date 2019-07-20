<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
  public function posts() {
    return $this->hasMany('App\Post');
  }
}
