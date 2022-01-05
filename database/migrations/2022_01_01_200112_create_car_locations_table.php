<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_locations', function (Blueprint $table) {
            $table->string('plate_id');
            $table->string('location');
            $table->primary(['plate_id', 'location']);
            $table->foreign('plate_id')->references("plate_id")->on('cars')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('car_locations');
    }
}
