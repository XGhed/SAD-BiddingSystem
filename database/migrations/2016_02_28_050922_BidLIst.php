<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BidLIst extends Migration
{
    public function up()
{

    Schema::create('BidList', function(Blueprint $table)
    {
        $table->primary(array('BidID', 'ItemID'));
        $table->integer('BidID')->unsigned();
        $table->integer('ItemID')->unsigned();
        $table->foreign('BidID')->references('BidID')->on('Bid');
        $table->foreign('ItemID')->references('ItemID')->on('Items');
        $table->integer('Price');
    });
}

public function down()
{

    Schema::drop('BidList');
    
}
}
