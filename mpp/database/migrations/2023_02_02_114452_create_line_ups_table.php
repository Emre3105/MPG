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
        Schema::create('line_ups', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('player_id')->unique();
            $table->unsignedBigInteger('pointGuard')->nullable();
            $table->unsignedBigInteger('shootingGuard')->nullable();
            $table->unsignedBigInteger('smallForward')->nullable();
            $table->unsignedBigInteger('powerForward')->nullable();
            $table->unsignedBigInteger('center')->nullable();

            $table->timestamps();
            $table->foreign('player_id')->references('id')->on('players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('line_ups');
    }
};
