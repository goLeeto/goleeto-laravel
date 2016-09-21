<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductFeatures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productFeatures', function (Blueprint $table) {
            $table->integer('productId')->unsigned();
            $table->integer('featureId')->unsigned();

            $table->foreign('productId')->references('id')->on('products');
            $table->foreign('featureId')->references('id')->on('features');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('productFeatures');
    }
}
