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
            $table->string('photo')->nullable();
            $table->string('klinik_name')->nullable();
            $table->string('klinik_owner')->nullable();
            $table->string('klinik_owner_phone')->nullable();
            $table->string('klinik_permission')->nullable();
            $table->string('klinik_address')->nullable();
            $table->string('klinik_phone')->nullable();
            $table->integer('klinik_therapist')->nullable();
            $table->string('klinik_open_close')->nullable();
            $table->string('klinik_time_per_day')->nullable();
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
