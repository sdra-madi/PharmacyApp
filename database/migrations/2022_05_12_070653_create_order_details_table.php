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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_order');
            $table->foreign('id_order')->references('id')->on('orders');
            $table->unsignedBigInteger('id_warehouse_detail')->nullable();
            $table->foreign('id_warehouse_detail')->references('id')->on('warehouse_details');
            $table->unsignedBigInteger('id_recipe_medication')->nullable();
            $table->foreign('id_recipe_medication')->references('id')->on('recipe_medications');
            $table->integer('quantity');
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
        Schema::dropIfExists('order_details');
    }
};
