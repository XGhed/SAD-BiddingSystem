<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProvinceThirdParty extends Migration
{
     Schema::create('ProvinceThirdParty', function(Blueprint $table)
    {
        $table->primary(array('ProvinceID', 'PartyID'));
        $table->integer('ProvinceID')->unsigned();
        $table->foreign('ProvinceID')->references('ProvinceID')->on('Province');
        $table->integer('PartyID')->unsigned();
        $table->foreign('PartyID')->references('PartyID')->on('Delivery_ThirdParty');
    });
     public function down()
{

    Schema::drop('ProvinceThirdParty');
    
}
}
