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
        $table->Timestamp('DateTime');
        $table->integer('AccountID')->unsigned();
        $table->foreign('AccountID')->references('AccountID')->on('JoinBid');
    });
}

public function down()
{

    Schema::drop('Bid');
    
}
}
