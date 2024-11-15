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
        Schema::create('pharmacists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_pharmacy');
            $table->text('phone_number')->unique();
            $table->string('city');
            $table->string('description')->nullable();
            $table->float('location_x');
            $table->float('location_y');
            $table->text('license_number')->unique();
            $table->string('password');
            $table->string('code');
            $table->rememberToken();
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
        Schema::dropIfExists('pharmacists');
    }
};
