<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pickup extends Migration
{
    public function up()
{

    Schema::create('Pickup', function(Blueprint $table)
    {
        $table->increments('PickupID');
        $table->string('PickupPlace', 30);
        $table->dateTime('PickupDate');
    });
}

public function down()
{

    Schema::drop('Pickup');
    
}
}
