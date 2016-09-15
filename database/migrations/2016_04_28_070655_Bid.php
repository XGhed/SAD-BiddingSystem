<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bid extends Migration
{
   public function up()
{

    Schema::create('Bid', function(Blueprint $table)
    {
        $table->increments('BidID');
        $table->integer('AccountID')->unsigned();
        $table->integer('ItemID')->unsigned();
        $table->integer('AuctionID')->unsigned();
        $table->foreign('AccountID')->references('AccountID')->on('Account');
        $table->foreign('ItemID')->references('ItemID')->on('Items');
        $table->foreign('AuctionID')->references('AuctionID')->on('Auction');
        $table->integer('Price');
        $table->Timestamp('DateTime');
    });
}

public function down()
{

    Schema::drop('Bid');
    
}
}
