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
        $table->boolean('Paid')->default(0);
        $table->integer('CheckoutRequestID')->unsigned()->nullable()->default(NULL);
        $table->foreign('AccountID')->references('AccountID')->on('Account');
        $table->foreign('AuctionID')->references('AuctionID')->on('Auction');
        $table->foreign('CheckoutRequestID')->references('CheckoutRequestID')->on('CheckoutRequests');
    });
}

public function down()
{

    Schema::drop('JoinBid');
    
}
}
