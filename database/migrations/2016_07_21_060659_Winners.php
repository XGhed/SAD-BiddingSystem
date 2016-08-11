<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Winners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Winners', function(Blueprint $table)
        {
            $table->increments('WinnerID');
            $table->integer('ItemID')->unsigned();
            $table->integer('BidID')->unsigned();
            $table->integer('AuctionID')->unsigned();
            $table->foreign('ItemID')->references('ItemID')->on('Items');
            $table->foreign('BidID')->references('BidID')->on('Bid');
            $table->foreign('AuctionID')->references('AuctionID')->on('Auction');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
