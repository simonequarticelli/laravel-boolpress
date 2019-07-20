<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePostsTable extends Migration
{

    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
          $table->unsignedBigInteger('genre_id')->nullable()->after('id');
          $table->foreign('genre_id')->references('id')->on('genres');
        });
    }


    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
          $table->dropForeign('posts_genre_id_foreign'); 
          $table->dropColumn('genre_id');
        });
    }
}
