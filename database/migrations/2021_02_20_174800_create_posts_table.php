<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id("postsId");
            $table->unsignedBigInteger("authorId")->nullable();
            $table->unsignedBigInteger("categoriesId")->nullable();
            $table->string("title");
            $table->string("description");
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign("authorId")->references("id")->on("users");
            $table->foreign("categoriesId")->references("categoriesId")->on("categories");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
