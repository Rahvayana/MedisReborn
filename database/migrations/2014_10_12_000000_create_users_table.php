<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->nullable();
            $table->string('gender')->nullable();
            $table->string('birth')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('klinik_name')->nullable();
            $table->string('klinik_permission')->nullable();
            $table->string('klinik_address')->nullable();
            $table->string('klinik_phone')->nullable();
            $table->string('klinik_therapist')->nullable();
            $table->string('klinik_schedule')->nullable();
            $table->string('klinik_open')->nullable();
            $table->string('klinik_hour')->nullable();
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
        Schema::dropIfExists('users');
    }
}
