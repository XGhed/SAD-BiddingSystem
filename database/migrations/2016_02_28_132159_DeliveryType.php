<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeliveryType extends Migration
{
    public function up()
{

    Schema::create('DeliveryType', function(Blueprint $table)
    {
        $table->increments('DeliveryTypeID');
        $table->integer('CompanyID')->unsigned();
        $table->integer('PartyID')->unsigned();
        $table->foreign('CompanyID')->references('CompanyID')->on('Delivery_Company');
        $table->foreign('PartyID')->references('PartyID')->on('Delivery_ThirdParty');
    });
}

public function down()
{

    Schema::drop('DeliveryType');
    
}
}
