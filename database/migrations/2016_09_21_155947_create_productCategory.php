<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productCategorys', function (Blueprint $table) {
            $table->integer('productId')->unsigned();
            $table->integer('categoryId')->unsigned();

            $table->foreign('productId')->references('id')->on('products');
            $table->foreign('categoryId')->references('id')->on('categorys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('productCategorys');
    }
}
