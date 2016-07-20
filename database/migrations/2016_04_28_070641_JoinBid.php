<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JoinBid extends Migration
{
    public function up()
{

    Schema::create('JoinBid', function(Blueprint $table)
    {
        $table->increments('JoinbidID');
        $table->dateTime('DateJoined');
        $table->integer('AccountID')->unsigned();
        $table->integer('AuctionID')->unsigned();
        $table->foreign('AccountID')->references('AccountID')->on('Account');
        $table->foreign('AuctionID')->references('AuctionID')->on('Auction');
    });
}

public function down()
{

    Schema::drop('JoinBid');
    
}
}
