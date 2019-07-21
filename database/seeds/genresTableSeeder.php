<?php

use Illuminate\Database\Seeder;
use App\Genre;
// percorso helper per slug
use Illuminate\Support\Str;

class genresTableSeeder extends Seeder
{

    public function run()
    {
      $genres = ['kitchen', 'Sport', 'free time', 'science'];

      foreach ($genres as $genre) {
        $new_genre = new Genre();
        $new_genre->name = $genre;
        $new_genre->slug = Str::slug($new_genre->name);
        $new_genre->save();
      }

    }
}
