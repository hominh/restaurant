<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFootsTable extends Migration
{
	
	/**
	* Run the migrations.
    *
    * @return void
	*/
	public function up()
	{
        Schema::create('foots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('alias');
            $table->integer('price');
            $table->text('intro');
            $table->longText('content');
            $table->string('image');
            $table->string('keyword');
            $table->string('description');
            $table->string('size');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->integer('foottype_id')->unsigned();
            $table->foreign('foottype_id')->references('id')->on('foottypes')->onDelete('cascade');
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
            Schema::drop('foots');
	    }
}
