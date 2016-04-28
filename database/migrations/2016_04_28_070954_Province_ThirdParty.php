<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProvinceThirdParty extends Migration
{
    public function up()
{

    Schema::create('ProvinceThirdParty', function(Blueprint $table)
    {
        $table->primary(array('ProvinceID','PartyID'));
        $table->integer('PartyID')->unsigned();
        $table->integer('ProvinceID')->unsigned();
        $table->foreign('PartyID')->references('PartyID')->on('Delivery_ThirdParty');
        $table->foreign('ProvinceID')->references('ProvinceID')->on('Province');
    });
}

public function down()
{

    Schema::drop('ProvinceThirdParty');
    
}
}
