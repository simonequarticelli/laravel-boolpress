<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{

    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique();
            // slug <= nome url della pagina
            $table->string('slug');
            // longText => per i tag html
            $table->longText('content');
            $table->string('author');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
