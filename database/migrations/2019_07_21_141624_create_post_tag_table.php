<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagTable extends Migration
{

    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            // creo due colonne
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');
            // creo chiavi esterne
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('tag_id')->references('id')->on('tags');
            // creo chiave primaria UNIVOCA
            $table->primary(['post_id', 'tag_id']);

        });
    }


    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
