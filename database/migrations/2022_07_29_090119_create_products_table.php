<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->integer('old_price')->unsigned();
            $table->integer('new_price')->unsigned();
            $table->string('thumb');
            $table->string('desc')->nullable();
            $table->text('content')->nullable();
            $table->bigInteger('product_cats_id')->unsigned();
            $table->foreign('product_cats_id')->references('id')->on('product_cats')->onDelete('cascade');
            $table->bigInteger('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
