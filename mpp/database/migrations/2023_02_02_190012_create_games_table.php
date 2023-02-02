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
        Schema::create('games', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('home_player_id');
            $table->integer('home_player_points')->default(0);
            $table->unsignedBigInteger('visiting_player_id');
            $table->integer('visiting_player_points')->default(0);
            $table->integer('game_number');

            $table->timestamps();
            $table->foreign('home_player_id')->references('id')->on('players');
            $table->foreign('visiting_player_id')->references('id')->on('players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
