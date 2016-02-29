<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LogTable extends Migration
{
    public function up()
{

    Schema::create('LogTable', function(Blueprint $table)
    {
        $table->increments('LogID');
        $table->integer('AccountID')->unsigned();
        $table->integer('BidID')->unsigned();
        $table->integer('DeliverID')->unsigned();
        $table->foreign('AccountID')->references('AccountID')->on('Account');
        $table->foreign('BidID')->references('BidID')->on('Bid');
        $table->foreign('DeliverID')->references('DeliverID')->on('Deliver');
    });
}

public function down()
{

    Schema::drop('LogTable');
    
}
}
