<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchCateRela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('branchrelationship', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('branch_id')->unsigned();
          $table->integer('category_id')->unsigned();
          $table->timestamps();
          $table->foreign('branch_id')->references('id')->on('branches');
          $table->foreign('category_id')->references('id')->on('categories');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branchrelationship');
    }
}
