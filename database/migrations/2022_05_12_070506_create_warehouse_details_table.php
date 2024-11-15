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
        Schema::create('warehouse_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_recipe_medication');
            $table->foreign('id_recipe_medication')->references('id')->on('recipe_medications');
            $table->unsignedBigInteger('id_warehouse');
            $table->foreign('id_warehouse')->references('id')->on('warehouses');
            $table->integer('quantity');
            $table->integer('discount_type')->nullable();
            $table->integer('discount_per')->nullable();
            $table->integer('discount_num')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('max_quantitytosell')->nullable();
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
        Schema::dropIfExists('warehouse_details');
    }
};
