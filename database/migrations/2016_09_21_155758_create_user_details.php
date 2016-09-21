<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userDetails', function (Blueprint $table) {
            $table->integer('UserId')->unsigned();
            $table->string('email');
            $table->integer('address')->unsigned();
            $table->dateTime('birthdate');

            $table->foreign('UserId')->references('id')->on('users');
            $table->foreign('address')->references('id')->on('address');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('userDetails');
    }
}
