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
        Schema::create('basketballers_players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('basketballer_id');
            $table->unsignedBigInteger('player_id');
            $table->integer('price');
            $table->timestamps();
            
            $table->unique(['basketballer_id', 'player_id']);
            $table->foreign('basketballer_id')->references('id')->on('basketballers');
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
        Schema::dropIfExists('basketballers_players');
    }
};
