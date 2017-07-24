<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPosttypeIdToPosts extends Migration
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
             $table->string('name')->unique();
             $table->string('alias');
             $table->text('intro');
             $table->longText('content');
             $table->string('image');
             $table->string('keyword');
             $table->string('description');
             $table->integer('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->integer('posttype_id')->unsigned();
             $table->foreign('posttype_id')->references('id')->on('posttypes')->onDelete('cascade');
             $table->timestamps();
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
          Schema::drop('posts');
     }
}
