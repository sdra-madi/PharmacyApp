<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pharmacist')->nullable();
            $table->foreign('id_pharmacist')->references('id')->on('pharmacists');
            $table->unsignedBigInteger('id_warehouse');
            $table->foreign('id_warehouse')->references('id')->on('warehouses');
            $table->unsignedBigInteger('id_company')->nullable();
            $table->foreign('id_company')->references('id')->on('companies');
            $table->date('order_date');
            $table->boolean('isdelivered')->default(false);
            $table->integer('price_order')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
