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
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_ofresponse');
            $table->text('phone_number_call')->nullable()->unique();
            $table->text('phone_number_land')->nullable();
            $table->text('phone_number_whatsup')->nullable();
            $table->time('worktime_from');
            $table->time('worktime_to');
            $table->string('workdayes');
            $table->string('city');
            $table->float('location_x');
            $table->float('location_y');
            $table->text('license_number')->unique();
            $table->string('photo')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('warehouses');
    }
};
