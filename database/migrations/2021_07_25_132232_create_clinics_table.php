<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('photo');
            $table->string('klinik_name');
            $table->string('klinik_owner');
            $table->string('klinik_owner_phone');
            $table->string('klinik_permission');
            $table->string('klinik_address');
            $table->string('klinik_phone');
            $table->integer('klinik_therapist');
            $table->string('klinik_open_close');
            $table->string('klinik_time_per_day');
            $table->string('latitude');
            $table->string('longitude');
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
        Schema::dropIfExists('clinics');
    }
}
