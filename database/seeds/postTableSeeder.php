<?php

use Illuminate\Database\Seeder;

// percorso classe Faker
use Faker\Factory as Faker;

// percorso model Post
use App\Post;

// percorso helper per slug
use Illuminate\Support\Str;

class postTableSeeder extends Seeder
{

    public function run()
    {
      // utilizzo della classe faker <= helper
      $faker = Faker::create('it_IT'); // <= genera in italiano

      for ($i=0; $i < 30 ; $i++) {
        $new_post = new Post();
        $new_post->title = $faker->sentence();
        $new_post->content = $faker->text(200);
        $new_post->author = $faker->name();
        // uso il titolo del post come slug
        $new_post->slug = Str::slug($new_post->title);
        $new_post->save();

      }

    }
}
