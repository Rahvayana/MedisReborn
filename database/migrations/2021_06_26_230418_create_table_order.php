<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrder extends Migration
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
            $table->string('name');
            $table->string('phone');
            $table->string('order_id');
            $table->string('klinik_name');
            $table->string('therapy_name');
            $table->string('therapy_price');
            $table->string('total_payment')->nullable();
            $table->date('tanggal_pengobatan');
            $table->string('jam_pengobatan')->nullable();
            $table->string('bukti_transfer')->nullable();
            $table->integer('no_urut')->nullable();
            $table->index('order_id');

            $table->foreignId('klinik_id');
            $table->foreignId('user_id');
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
        Schema::dropIfExists('table_order');
    }
}
