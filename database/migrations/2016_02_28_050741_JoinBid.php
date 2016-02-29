<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JoinBid extends Migration
{
    public function up()
{

    Schema::create('JoinBid', function(Blueprint $table)
    {
        $table->increments('BidderNo');
        $table->dateTime('DateJoined');
        $table->integer('AccountID')->unsigned();
        $table->foreign('AccountID')->references('AccountID')->on('Account');
    });
}

public function down()
{

    Schema::drop('JoinBid');
    
}
}
