<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditTableProduct extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('categories', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->timestamps();
    });
    Schema::create('branches', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->timestamps();
    });
    Schema::table('products', function($table)
    {
      $table->integer('category_id')->unsigned();
      $table->integer('branch_id')->unsigned();
      $table->string('status');
      $table->string('condition');
      $table->foreign('category_id')->references('id')->on('categories');
      $table->foreign('branch_id')->references('id')->on('branches');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('categories');
    Schema::dropIfExists('branches');
  }
}
