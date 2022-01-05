<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->integer('SSN');
            $table->unsignedBigInteger('user_id');
            $table->primary(['SSN', 'user_id']);
            $table->foreign('user_id')->references("id")->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->string('fname');
            $table->string('lname');
            $table->integer('age');
            $table->string('gender');
            $table->integer('license_no');
            $table->integer('phone');
            $table->string('city');
            $table->string('country');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
