<?php

use Illuminate\Database\Seeder;
use App\Tag;
// percorso helper per slug
use Illuminate\Support\Str;

class tagsTableSeeder extends Seeder
{

    public function run()
    {
      $tags = ['first-tag', 'second-tag', 'third-tag'];

      foreach ($tags as $tag) {
        $new_tag = new Tag();
        $new_tag->name = $tag;
        $new_tag->slug = Str::slug($new_tag->name);
        $new_tag->save();
      }

    }
}
