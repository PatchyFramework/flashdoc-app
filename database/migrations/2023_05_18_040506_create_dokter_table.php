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
        Schema::create('dokter', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->text('address')->nullable();
            $table->time('jam_praktek')->nullable();
            $table->string('password');

            $table->unsignedBigInteger('spesialis_id');
            $table->foreign('spesialis_id')->references('id')->on('spesialis');

            $table->unsignedBigInteger('faskes_id');
            $table->foreign('faskes_id')->references('id')->on('faskes');


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokter');
    }
};
