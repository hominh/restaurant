<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('title');
            $table->string('titleofcourtesy');
            $table->dateTime('birthdate');
            $table->dateTime('hiredate');
            $table->string('address');
            $table->string('city');
            $table->string('region');
            $table->string('postalcode');
            $table->string('country');
            $table->string('homephone');
            $table->string('extension');
            $table->string('photo');
            $table->string('note');
            $table->string('facebook_url');
            $table->string('twitter_url');
            $table->string('tumblr_url');
            $table->integer('position_id')->unsigned();
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('employees');
    }
}
