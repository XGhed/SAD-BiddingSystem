<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeliveryThirdParty extends Migration
{
    public function up()
{

    Schema::create('Delivery_ThirdParty', function(Blueprint $table)
    {
        $table->increments('PartyID');
        $table->string('PartyName', 30);
        $table->softDeletes();
    });
}

public function down()
{

    Schema::drop('Delivery_ThirdParty');
    
}
}
