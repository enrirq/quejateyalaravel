<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
          $table->increments('id');
          $table->string('title',60)->nullable();
          $table->text('description')->nullable();
          $table->string('tags',150)->nullable();
          $table->double('latitude')->unsigned();
          $table->double('longitude')->unsigned();
          $table->boolean('published');
          $table->boolean('solved');
          $table->integer('user_created')->unsigned();
          $table->integer('user_modified')->unsigned();
          $table->integer('user_solved')->unsigned();
          $table->timestamps();
          $table->integer('category_id')->unsigned();
          $table->foreign('category_id')->references('id')->on('categories');
          $table->integer('city_id')->unsigned();
          $table->foreign('city_id')->references('id')->on('cities');
          $table->integer('priority_id')->unsigned();
          $table->foreign('priority_id')->references('id')->on('priorities');
          $table->integer('valuation_id')->unsigned();
          $table->foreign('valuation_id')->references('id')->on('valuations');
          $table->integer('comment_id')->unsigned();
          $table->foreign('comment_id')->references('id')->on('comments');
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
