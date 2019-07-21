<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(postTableSeeder::class);
        $this->call(genresTableSeeder::class);
        $this->call(tagsTableSeeder::class);
    }
}
