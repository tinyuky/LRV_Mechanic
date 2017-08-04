<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('products', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->string('content');
          $table->integer('price');
          $table->timestamps();
      });

      Schema::create('images', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('product_id')->unsigned();
          $table->string('path');
          $table->timestamps();
          $table->foreign('product_id')->references('id')->on('products');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('images');
    }
}
