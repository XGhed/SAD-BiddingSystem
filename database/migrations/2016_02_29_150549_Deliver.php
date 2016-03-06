<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Deliver extends Migration
{
    public function up()
{

    Schema::create('Deliver', function(Blueprint $table)
    {
        $table->increments('DeliverID');
        $table->integer('DeliveryType')->unsigned();
        $table->foreign('DeliveryType')->references('DeliveryTypeID')->on('DeliveryType');
    });
}

public function down()
{

    Schema::drop('Deliver');
    
}
}
