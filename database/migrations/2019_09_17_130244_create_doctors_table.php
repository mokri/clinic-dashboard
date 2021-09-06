<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('birthdate');
            $table->string('speciality')->nullable();
            $table->string('gender')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('about')->nullable();
            $table->text('experience')->nullable();
            $table->text('university')->nullable();
            $table->string('pictureUrl')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
