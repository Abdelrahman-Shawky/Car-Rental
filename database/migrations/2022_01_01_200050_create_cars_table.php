<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->string('plate_id')->primary();
            $table->string("manufacturer");
            $table->string("model");
            $table->integer("year");
            $table->double("price");
            $table->double("insurance");
            $table->string("transmission");
            $table->string("gas_type");
            $table->string("fuel_cumsumption");
            $table->boolean("air_conditioning");
            $table->boolean("bluetooth");
            $table->boolean("status");
            $table->String("image");
            $table->string("type"); 
            $table->foreign('type')->references("type")->on('car_types')->onUpdate('cascade')->onDelete('restrict');
        

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}