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
        Schema::create('recipe_medications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_recipe');
            $table->foreign('id_recipe')->references('id')->on('recipes');
            $table->unsignedBigInteger('id_medication');
            $table->foreign('id_medication')->references('id')->on('medications');
            $table->double('warehouse_price',6,2);
            $table->double('pharmacist_price',6,2);
            $table->date('expiry_date');
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
        Schema::dropIfExists('recipe_medications');
    }
};
