<?php

use Illuminate\Database\Seeder;
use App\Genre;

class genresTableSeeder extends Seeder
{

    public function run()
    {
      $genres = ['kitchen', 'Sport', 'free time', 'science'];

      foreach ($genres as $genre) {
        $new_genre = new Genre();
        $new_genre->name = $genre;
        $new_genre->save();
      }

    }
}
