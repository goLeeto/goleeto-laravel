<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('UserName')->unique();
            $table->string('email')->unique();
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('password');
            $table->integer('UserType')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('UserType')->references('id')->on('userTypes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
