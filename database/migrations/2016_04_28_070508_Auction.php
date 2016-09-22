<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Auction extends Migration
{
    public function up()
{

    Schema::create('Auction', function(Blueprint $table)
    {
        $table->increments('AuctionID');
        $table->string('EventName');
        $table->dateTime('StartDateTime');
        $table->dateTime('EndDateTime');
        $table->integer('EventFee');
        $table->integer('NextBidPercent');
        $table->string('Description');
    });
}

public function down()
{

    Schema::drop('Auction');
    
}
}
