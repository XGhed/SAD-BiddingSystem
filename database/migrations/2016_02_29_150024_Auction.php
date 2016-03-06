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
        $table->time('TimeExtension');
        $table->time('MaxTimeExtension');
    });
}

public function down()
{

    Schema::drop('Auction');
    
}
}
