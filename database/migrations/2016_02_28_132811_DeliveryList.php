<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeliveryList extends Migration
{
    public function up()
{

    Schema::create('DeliverList', function(Blueprint $table)
    {
        $table->primary(array('DeliveryID','ItemID'));
        $table->integer('DeliveryID')->unsigned();
        $table->integer('ItemID')->unsigned();
        $table->foreign('DeliveryID')->references('DeliverID')->on('Deliver');
        $table->foreign('ItemID')->references('ItemID')->on('Items');
        $table->integer('Quantity');
        $table->integer('Price');
    });
}

public function down()
{

    Schema::drop('DeliverList');
    
}
}
