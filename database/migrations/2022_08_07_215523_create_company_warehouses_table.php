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
        Schema::create('company_warehouses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_warehouses');
            $table->foreign('id_warehouses')->references('id')->on('warehouses');
            $table->unsignedBigInteger('id_companies');
            $table->foreign('id_companies')->references('id')->on('companies');
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
        Schema::dropIfExists('company_warehouses');
    }
};
