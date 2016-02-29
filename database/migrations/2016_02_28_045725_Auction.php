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
        $table->dateTime('StartDateTime');
        $table->dateTime('EndDateTime');
    });
}

public function down()
{

    Schema::drop('Auction');
    
}
}
