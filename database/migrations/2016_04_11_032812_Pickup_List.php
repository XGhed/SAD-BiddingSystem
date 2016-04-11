<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PickupList extends Migration
{
    public function up()
{

    Schema::create('Pickup_List', function(Blueprint $table)
    {
        $table->primary(array('PickupID','ItemID'));
        $table->integer('PickupID')->unsigned();
        $table->integer('ItemID')->unsigned();
        $table->foreign('PickupID')->references('PickupID')->on('Pickup');
        $table->foreign('ItemID')->references('ItemID')->on('Items');
        $table->integer('Quantity');
        $table->decimal('Price', 8, 2);
    });
}

public function down()
{

    Schema::drop('Pickup_List');
    
}
}
