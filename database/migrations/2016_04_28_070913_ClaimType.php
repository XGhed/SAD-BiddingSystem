<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClaimType extends Migration
{
    public function up()
{

    Schema::create('ClaimType', function(Blueprint $table)
    {
        $table->increments('ClaimTypeID');
        $table->integer('DeliverID')->unsigned();
        $table->integer('PickupID')->unsigned();
        $table->foreign('DeliverID')->references('DeliverID')->on('Deliver');
        $table->foreign('PickupID')->references('PickupID')->on('Pickup');
    });
}

public function down()
{

    Schema::drop('DeliveryType');
    
}
}
