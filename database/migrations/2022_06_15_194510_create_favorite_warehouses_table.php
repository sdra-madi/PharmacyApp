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
        Schema::create('favorite_warehouses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('favorite_id');
            $table->foreign('favorite_id')->references('id')->on('favorites');
            $table->unsignedBigInteger('id_warehouse');
            $table->foreign('id_warehouse')->references('id')->on('warehouses');
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
        Schema::dropIfExists('favorite_warehouses');
    }
};
