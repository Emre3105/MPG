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
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transfer_market_id');
            $table->unsignedBigInteger('basketballer_id');
            $table->integer('price');
            $table->timestamps();
            
            $table->foreign('transfer_market_id')->references('id')->on('transfer_markets');
            $table->foreign('basketballer_id')->references('id')->on('basketballers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bids');
    }
};
